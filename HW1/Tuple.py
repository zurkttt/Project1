row = int(input("Enter row: "))
col = int(input("Enter column: "))

outertuple = ()
outerlist = []

#Ask the user for numbers
for x in range(row):
    print(f"Row {x+1}")
    innerlist = []
    for y in range(col):
        num = float(input(f"Enter number {y+1}: "))
        innerlist.append(num)
        innertuple = tuple(innerlist)
    outerlist.append(innertuple)
    outertuple = tuple(outerlist)
    print()

#Search for number
search = float(input("Search: "))
found = False

#Print the numbers by row
print("\nThe numbers are: ")
for x in outertuple:
    for y in x:
        print(y, end= " ")
    print()

#For loop for searching number
for x in range(row):
    for y in range(col):
        if outertuple[x][y] == search:
            print(f"\nNumber {search} is in row {x}, col {y}")
            found = True
if not found:
    print(f"Number {search} is not on the tuple")
