row = int(input("Enter row: "))
col = int(input("Enter column: "))

numberDict = {}

#Ask the user for numbers
for x in range(row):
    print(f"Row {x+1}")
    for y in range(col):
        num = float(input(f"Enter number {y+1}: "))
        numberDict[(x,y)] = num
    print()

#Search for number
search = float(input("Search: "))
found = False

#Print the numbers by row
print("\nThe numbers are: ")
for x in range(row):
    for y in range(col):
        print(numberDict[(x, y)], end=" ")
    print()

#For loop for searching number
for x in range(row):
    for y in range(col):
        if numberDict[(x,y)] == search:
            print(f"\nNumber {search} is in row {x}, col {y}")
            found = True
if not found:
    print(f"Number {search} is not on the tuple")
