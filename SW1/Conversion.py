dollar = [59,200,500]


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
    print(f"{x:<10}        {dollartophp(x):.2f}              {dollartoyen(x):.2f}")