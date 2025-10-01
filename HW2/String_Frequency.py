def string_frequency(word):
    freq = {}
    for i in word:
        if i != " " and i != ",": 
            if i in freq:
                freq[i] += 1
            else:
                freq[i] = 1
    return freq

string = input("Enter string: ")

words = string.split()

for word in words:
    freq = string_frequency(word)
    for k, v in freq.items():
        print(f"{k}={v}", end=", ")
    print()
