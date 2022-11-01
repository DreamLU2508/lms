from cmath import sqrt
from hashlib import new
from unittest import result


T = ["apple", "banana", "cherry", "logan", "orange", "cocoa", "custard apple", "grape", "jackfruit"]
D = [
    "this apple is an bad apple, I will custard apple throw this apple away",
    "this is a banana not an apple",
    "I just bought 1 kg jackfruit of fruit including grapes, oranges and longan",
    "I have 2 pounds of cocoa at home logan",
    "Cuong gave me 1 jackfruit but I already have 2 jackfruit",
    "custard apple is the queen of custard apple fruit, I quite like custard banana apple but I still prefer to eat apple"
]
Q = "T want to eat apple and banana"

D[1].split(" ")

def VectorRepresentation(T, d):
    vector = []
    dArray  = d.replace(',','').split(' ')
    for item in T:
        vector.append(dArray.count(item))
    return vector

def sumOfSquares(vector):
    result = 0
    for item in vector:
        result = result + item*item
    return result

def normalize(vector):
    newVector = []
    for item in vector:
        newVector.append(item/sqrt(sumOfSquares(vector)))
    return newVector

def CosineSimilarity(T, d):
    return [sum(i*j for i, j in zip(T, d))]


listVector = []
for item in D:
    listVector.append(VectorRepresentation(T, item))

normalizeListVector = []
for item in listVector:
    normalizeListVector.append(normalize(item))

vectorQ = VectorRepresentation(T, Q)

print(normalizeListVector)