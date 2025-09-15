numrep = int(input("Enter how many number you will convert: "))
dollar = []
for x in range(numrep):
    num = float(input("Enter currency in $: "))
    dollar.append(num)


def dollartophp(num):
    dollar = 57.17
    php = num * dollar
    return php

def dollartoyen(num):
    dollar = 146.67
    yen = num * dollar
    return yen


print("Dollar($)        Phil Peso(P)          Jpn Yen(Y)")
for x in dollar:
    print(f"{x}                {dollartophp(x):.2f}              {dollartoyen(x):.2f}")