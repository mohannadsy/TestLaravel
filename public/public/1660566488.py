# Connect to Drive 
from google.colab import drive

drive.mount('/content/drive')

# Import Libraries
import numpy as np
import tensorflow as tf
from tensorflow import keras
from tensorflow.keras.layers.experimental.preprocessing import TextVectorization
from sklearn.model_selection import train_test_split
import os

# Initilize Parameters
batch_size = 64
epochs = 2
latent_dim = 256
num_samples = 6500

dataset = '/content/drive/MyDrive/Colab Notebooks/ara.txt'
arabic_text = []
english_text = []
arabic_word = set()
english_word = set()
sample = 0
with open(dataset) as f:
    english_word.add("<sos>")
    english_word.add("<eos>")
    for line in f:
        sample += 1
        if sample == num_samples:
            break
        arabic_sentence, english_sentence, _ = line.split('\t')
        arabic_text.append(arabic_sentence)
        # We use <sos> as the "start of sequence" character
        # for the targets, and "<eos>" as "end of sequence" character.
        english_text.append("<sos> " + english_sentence + " <eos>")
        for word in arabic_sentence.split():
            if word not in arabic_word:
                arabic_word.add(word)
        for word in english_sentence.split():
            if word not in english_word:
                english_word.add(word)

for i in range(3):
    print(f"English: {arabic_text[i]}")
    print(f"Arabic: {english_text[i]}")
    print("---------------------------------------------------")

for i in range(1, 4):
    print(f"English: {arabic_text[-i]}")
    print(f"Arabic: {english_text[-i]}")
    print("---------------------------------------------------")

arabic_word = sorted(list(arabic_word))
num_arabic_tokens = len(arabic_word)
max_arabic_length = max([len(txt) for txt in arabic_text])
english_word = sorted(list(english_word))
num_english_tokens = len(english_word)
max_english_length = max([len(txt) for txt in english_text])

arabic_vector = TextVectorization(max_tokens=num_arabic_tokens, output_sequence_length=max_arabic_length)
arabic_dataset = tf.data.Dataset.from_tensor_slices(arabic_text)
arabic_vector.adapt(arabic_dataset)
arabic_vocab = arabic_vector.get_vocabulary()
word_index_eng = dict(zip(arabic_vocab, range(len(arabic_vocab))))

english_vector = TextVectorization(max_tokens=num_english_tokens, output_sequence_length=max_english_length)
english_dataset = tf.data.Dataset.from_tensor_slices(english_text).batch(128)
english_vector.adapt(english_dataset)
english_vocab = english_vector.get_vocabulary()
word_index_ara = dict(zip(english_vocab, range(len(english_vocab))))

reverse_input_char_index = dict((i, char) for char, i in word_index_eng.items())
reverse_target_char_index = dict((i, char) for char, i in word_index_ara.items())

path_to_glove_file = "/content/drive/MyDrive/Colab Notebooks/ara.txt"

embeddings_index = {}
with open(path_to_glove_file) as f:
    for line in f:
        word, coefs = line.split(maxsplit=1)
        coefs = np.fromstring(coefs, "f", sep=" ")
        embeddings_index[word] = coefs

num_arabic_tokens = len(arabic_vocab) + 2
embedding_dim = 300

embedding_matrix_arabic = np.zeros((num_arabic_tokens, embedding_dim))
for word, i in word_index_eng.items():
    embedding_vector = embeddings_index.get(word)
    if embedding_vector is not None:
        embedding_matrix_arabic[i] = embedding_vector

num_english_tokens = len(english_vocab) + 2

del embeddings_index

X = arabic_vector(np.array([[s] for s in arabic_text])).numpy()
y = english_vector(np.array([[s] for s in english_text])).numpy()

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.1, random_state=32)

col = np.zeros(y_train.shape[0]).reshape(y_train.shape[0], 1)
shifted_y_train = np.append(y_train[:, 1:], col, axis=1)

del col
del X
del y

decoder_target_data_shifted = np.zeros(
    (len(shifted_y_train), max_english_length, num_english_tokens), dtype="float32"
)

for i, sample in enumerate(shifted_y_train):
    for j, word_index in enumerate(sample):
        decoder_target_data_shifted[i, j, int(word_index)] = 1.0

del shifted_y_train

# Model

from tensorflow.keras.layers import Embedding

encoder_embedding_layer = Embedding(
    num_arabic_tokens,
    embedding_dim,
    embeddings_initializer=keras.initializers.Constant(embedding_matrix_arabic),
    trainable=False,
)

decoder_embedding_layer = Embedding(
    num_english_tokens,
    embedding_dim,
    trainable=True,
)


encoder_inputs = keras.Input(shape=(None,))
encoder_embedded_sequences = encoder_embedding_layer(encoder_inputs)
encoder = keras.layers.LSTM(latent_dim, return_state=True, return_sequences=True)  # LSTM or GRU
encoder_outputs, state_h, state_c = encoder(encoder_embedded_sequences)
encoder_states = [state_h, state_c]


decoder_inputs = keras.Input(shape=(None,))
decoder_embedded_sequences = decoder_embedding_layer(decoder_inputs)
decoder_lstm = keras.layers.LSTM(latent_dim, return_sequences=True, return_state=True)
decoder_outputs, _, _ = decoder_lstm(decoder_embedded_sequences, initial_state=encoder_states)
decoder_dense = keras.layers.Dense(num_english_tokens, activation="softmax")

# Attention

# attention = keras.layers.Dense(encoder_states ,activation="softmax")(encoder_outputs)



decoder_outputs = decoder_dense(decoder_outputs)


# encoder = Encoder(num_arabic_tokens, embedding_dim, units, BATCH_SIZE)
# decoder = Decoder(num_english_tokens, embedding_dim, units, BATCH_SIZE)


model = keras.Model([encoder_inputs, decoder_inputs], decoder_outputs)

model.compile(
    optimizer="rmsprop", loss="categorical_crossentropy", metrics=["accuracy"]
)

model.fit(
    [X_train, y_train],
    decoder_target_data_shifted,
    batch_size=batch_size,
    epochs=epochs,
    validation_split=0.1,
)
# Save model
model.save("//content/drive/MyDrive/Colab Notebooks/Model/Model.nmt-attention")


# the end


















model = keras.models.load_model("//content/drive/MyDrive/Colab Notebooks/Model/Model.nmt-attention")

model.save_weights("//content/drive/MyDrive/Colab Notebooks/Model/Model.nmt-attention")
from keras.utils.vis_utils import plot_model

plot_model(model, to_file='model_plot.png', show_shapes=True, show_layer_names=True)

"""# Evaluation using train data"""

model1 = keras.models.load_model("//content/drive/MyDrive/Colab Notebooks/Model/Model.nmt-attention")

ori = ""
for sample in X_train[50:100]:
    for e in sample:
        ori += reverse_input_char_index[e] + " "
    ori += '\n'
ori = ori.split('\n')

gT = []
for sample in y_train[50:100]:
    true_sample = []
    for e in sample:
        if reverse_target_char_index[e] == 'sos':
            continue
        true_sample.append(reverse_target_char_index[e])
        if reverse_target_char_index[e] == 'eos':
            break
    gT.append(' '.join(true_sample))

pred = model1.predict([X_train[50:100], y_train[50:100]])
predictions = []
for sample in pred:
    sampled_token_index = np.argmax(sample, axis=1)
    predicted_sample = []
    for e in sampled_token_index:
        predicted_sample.append(reverse_target_char_index[e])
        if reverse_target_char_index[e] == 'eos':
            break
    predictions.append(' '.join(predicted_sample))

for i in range(len(gT[:10])):
    print(f"Original: {ori[i]} \nGround Truth: {gT[i]} \nPrediction: {predictions[i]}")
    print()

from nltk.translate.bleu_score import corpus_bleu, sentence_bleu
from nltk.translate.bleu_score import SmoothingFunction

smoother = SmoothingFunction()

bleu_scores = corpus_bleu(predictions, gT) * 100
print(f"Bleu Score: {bleu_scores}%")

"""# Evaluation using test data"""

model1 = keras.models.load_model("//content/drive/MyDrive/Colab Notebooks/Model/Model.nmt-attention")
print(model1.summary())

ori = ""
for sample in X_test[:100]:
    for e in sample:
        ori += reverse_input_char_index[e] + " "
    ori += '\n'
ori = ori.split('\n')

gT = []
for sample in y_test[:100]:
    true_sample = []
    for e in sample:
        if reverse_target_char_index[e] == 'sos':
            continue
        true_sample.append(reverse_target_char_index[e])
        if reverse_target_char_index[e] == 'eos':
            break
    gT.append(' '.join(true_sample))

pred = model1.predict([X_test[:100], y_test[:100]])
predictions = []
for sample in pred:
    sampled_token_index = np.argmax(sample, axis=1)
    predicted_sample = []
    for e in sampled_token_index:
        predicted_sample.append(reverse_target_char_index[e])
        if reverse_target_char_index[e] == 'eos':
            break
    predictions.append(' '.join(predicted_sample))

for i in range(len(gT[:10])):
    print(f"Original: {ori[i]} \nGround Truth: {gT[i]} \nPrediction: {predictions[i]}")
    print()

from nltk.translate.bleu_score import corpus_bleu, sentence_bleu
from nltk.translate.bleu_score import SmoothingFunction

smoother = SmoothingFunction()

bleu_scores = corpus_bleu(predictions, gT) * 100
print(f"Bleu Score: {bleu_scores}%")

"""# Inference using train data"""

'''
Generate the 5 random sentences to translate from the X_test list
'''
from random import randint

sentences_index = set()
while len(sentences_index) != 5:
    sentences_index.add(randint(0, len(y_test) - 1))

'''
Encode the input and get the states from it
Set the first "Word" input of the decoder to our start of sentence token "sos"
Predict the next word, check if it is the end of sentence token "eos" ot if we 
reached maximum length to end the prediction.
If we do not need to end our prediction, update the input states of the next
prediction, which will be used as initial values for the lstm layer, to the 
values of the current lstm states.
Input the new states ("current") in addition to the predicted word and repeat  
'''


def decode_sequence(input_seq):
    states_value = inf_encoder_model.predict(np.expand_dims(input_seq, axis=0))

    target_seq = np.zeros((1, 1))
    target_seq[0, 0] = word_index_ara["sos"]

    stop_condition = False
    decoded_sentence = ""
    while not stop_condition:
        output_tokens, h, c = inf_decoder_model.predict([target_seq] + states_value)

        sampled_token_index = np.argmax(output_tokens, axis=2)[0][0]
        sampled_char = reverse_target_char_index[sampled_token_index]
        decoded_sentence += ' ' + sampled_char

        if sampled_char == "eos" or len(decoded_sentence) > max_english_length:
            stop_condition = True

        target_seq = np.zeros((1, 1))
        target_seq[0, 0] = sampled_token_index

        states_value = [h, c]
    return decoded_sentence


model = model1

'''
Use same encoder as the model, but output the states of the lstm layer
'''
inf_encoder_inputs = model.input[0]
inf_encoder_embedded_sequences = model.layers[2](inf_encoder_inputs)
inf_encoder_outputs, state_h, state_c = model.layers[4](inf_encoder_embedded_sequences)
inf_encoder_states = [state_h, state_c]
inf_encoder_model = keras.Model(inf_encoder_inputs, inf_encoder_states)

'''
use same decoder as the model, but take as input the output states of the encoder
in addition to the normal input which in our case is going to be the previous
predicted word. Set the states of the first lstm layer to the output states of 
the encoder model. Model outputs also its own states which will then be used as
initial state for the lstm layer
'''

inf_decoder_inputs = model.input[1]
inf_decoder_state_input_h = keras.Input(shape=(latent_dim,))
inf_decoder_state_input_c = keras.Input(shape=(latent_dim,))
inf_decoder_states_inputs = [inf_decoder_state_input_h, inf_decoder_state_input_c]
inf_decoder_embedded_sequences = model.layers[3](inf_decoder_inputs)
inf_decoder_outputs, state_h2, state_c2 = model.layers[5](inf_decoder_embedded_sequences,
                                                          initial_state=inf_decoder_states_inputs)
inf_decoder_states2 = [state_h2, state_c2]
inf_decoder_outputs2 = model.layers[6](inf_decoder_outputs)

inf_decoder_model = keras.Model(
    [inf_decoder_inputs] + inf_decoder_states_inputs,
    [inf_decoder_outputs2] + inf_decoder_states2)

for index in sentences_index:
    input_seq = X_train[index]
    print("\nInput Sequence: ", end="")
    for e in input_seq:
        print(reverse_input_char_index[e], end=" ")
    print("\nTrue translation: ", end="")
    for e in y_train[index]:
        print(reverse_target_char_index[e], end=" ")
    output = decode_sequence(input_seq)
    print("\nOutput Sequence: ", output)
    print("################################################")

"""# Inference using test data"""

'''
Generate the 5 random sentences to translate from the X_test list
'''
from random import randint

sentences_index = set()
while len(sentences_index) != 5:
    sentences_index.add(randint(0, len(y_test) - 1))

'''
Encode the input and get the states from it
Set the first "Word" input of the decoder to our start of sentence token "sos"
Predict the next word, check if it is the end of sentence token "eos" ot if we 
reached maximum length to end the prediction.
If we do not need to end our prediction, update the input states of the next
prediction, which will be used as initial values for the lstm layer, to the 
values of the current lstm states.
Input the new states ("current") in addition to the predicted word and repeat  
'''


def decode_sequence(input_seq):
    states_value = inf_encoder_model.predict(np.expand_dims(input_seq, axis=0))

    target_seq = np.zeros((1, 1))
    target_seq[0, 0] = word_index_ara["sos"]

    stop_condition = False
    decoded_sentence = ""
    while not stop_condition:
        output_tokens, h, c = inf_decoder_model.predict([target_seq] + states_value)

        sampled_token_index = np.argmax(output_tokens, axis=2)[0][0]
        sampled_char = reverse_target_char_index[sampled_token_index]
        decoded_sentence += ' ' + sampled_char

        if sampled_char == "eos" or len(decoded_sentence) > max_english_length:
            stop_condition = True

        target_seq = np.zeros((1, 1))
        target_seq[0, 0] = sampled_token_index

        states_value = [h, c]
    return decoded_sentence


model = model1

'''
Use same encoder as the model, but output the states of the lstm layer
'''
inf_encoder_inputs = model.input[0]
inf_encoder_embedded_sequences = model.layers[2](inf_encoder_inputs)
inf_encoder_outputs, state_h, state_c = model.layers[4](inf_encoder_embedded_sequences)
inf_encoder_states = [state_h, state_c]
inf_encoder_model = keras.Model(inf_encoder_inputs, inf_encoder_states)

'''
use same decoder as the model, but take as input the output states of the encoder
in addition to the normal input which in our case is going to be the previous
predicted word. Set the states of the first lstm layer to the output states of 
the encoder model. Model outputs also its own states which will then be used as
initial state for the lstm layer
'''

inf_decoder_inputs = model.input[1]
inf_decoder_state_input_h = keras.Input(shape=(latent_dim,))
inf_decoder_state_input_c = keras.Input(shape=(latent_dim,))
inf_decoder_states_inputs = [inf_decoder_state_input_h, inf_decoder_state_input_c]
inf_decoder_embedded_sequences = model.layers[3](inf_decoder_inputs)
inf_decoder_outputs, state_h2, state_c2 = model.layers[5](inf_decoder_embedded_sequences,
                                                          initial_state=inf_decoder_states_inputs)
inf_decoder_states2 = [state_h2, state_c2]
inf_decoder_outputs2 = model.layers[6](inf_decoder_outputs)

inf_decoder_model = keras.Model(
    [inf_decoder_inputs] + inf_decoder_states_inputs,
    [inf_decoder_outputs2] + inf_decoder_states2)

for index in sentences_index:
    input_seq = X_test[index]
    print("\nInput Sequence: ", end="")
    for e in input_seq:
        print(reverse_input_char_index[e], end=" ")
    print("\nTrue translation: ", end="")
    for e in y_test[index]:
        print(reverse_target_char_index[e], end=" ")
    output = decode_sequence(input_seq)
    print("\nOutput Sequence: ", output)
    print("################################################")





""" 
Encoder Decoder Classess


#Encoder
class Encoder(tf.keras.Model):
    def __init__(self, vocab_size, embedding_dim, enc_units, batch_sz):
        super(Encoder, self).__init__()
        self.batch_sz = batch_sz
        self.enc_units = enc_units
        self.embedding = tf.keras.layers.Embedding(vocab_size, embedding_dim)
        self.gru = gru(self.enc_units)

    def call(self, x, hidden):
        x = self.embedding(x)
        output, state = self.gru(x, initial_state=hidden)
        return output, state

    def initialize_hidden_state(self):
        return tf.zeros((self.batch_sz, self.enc_units))


class Decoder(tf.keras.Model):
    def __init__(self, vocab_size, embedding_dim, dec_units, batch_sz):
        super(Decoder, self).__init__()
        self.batch_sz = batch_sz
        self.dec_units = dec_units
        self.embedding = tf.keras.layers.Embedding(vocab_size, embedding_dim)
        self.gru = gru(self.dec_units)
        self.fc = tf.keras.layers.Dense(vocab_size)

        # used for attention
        self.W1 = tf.keras.layers.Dense(self.dec_units)
        self.W2 = tf.keras.layers.Dense(self.dec_units)
        self.V = tf.keras.layers.Dense(1)

    def call(self, x, hidden, enc_output):
        # enc_output shape == (batch_size, max_length, hidden_size)

        # hidden shape == (batch_size, hidden size)
        # hidden_with_time_axis shape == (batch_size, 1, hidden size)
        # we are doing this to perform addition to calculate the score
        hidden_with_time_axis = tf.expand_dims(hidden, 1)

        # score shape == (batch_size, max_length, 1)
        # we get 1 at the last axis because we are applying tanh(FC(EO) + FC(H)) to self.V
        score = self.V(tf.nn.tanh(self.W1(enc_output) + self.W2(hidden_with_time_axis)))

        # attention_weights shape == (batch_size, max_length, 1)
        attention_weights = tf.nn.softmax(score, axis=1)

        # context_vector shape after sum == (batch_size, hidden_size)
        context_vector = attention_weights * enc_output
        context_vector = tf.reduce_sum(context_vector, axis=1)

        # x shape after passing through embedding == (batch_size, 1, embedding_dim)
        x = self.embedding(x)

        # x shape after concatenation == (batch_size, 1, embedding_dim + hidden_size)
        x = tf.concat([tf.expand_dims(context_vector, 1), x], axis=-1)

        # passing the concatenated vector to the GRU
        output, state = self.gru(x)

        # output shape == (batch_size * 1, hidden_size)
        output = tf.reshape(output, (-1, output.shape[2]))

        # output shape == (batch_size * 1, vocab)
        x = self.fc(output)

        return x, state, attention_weights

    def initialize_hidden_state(self):
        return tf.zeros((self.batch_sz, self.dec_units))

"""