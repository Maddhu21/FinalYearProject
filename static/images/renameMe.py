import os

# Path to the input directory containing JPG images
input_directory = "D:\Project\FYP\FinalYearProject\multimedia\products"


# Iterate over the files in the input directory
countJeans = 0
countSofa = 0
countTshirt = 0
countTv = 0
for filename in enumerate(os.listdir(input_directory)):
    if filename.startswith("jeans_"):
        countJeans+=1
        dst = f"jeans_{str(countJeans)}.jpg"
        src = f"{input_directory}/{filename}"
        dst = f"{input_directory}/{dst}"

        os.rename(src, dest)

    if filename.startswith("sofa_"):
        countSofa+=1
        dst = f"sofa_{str(countSofa)}.jpg"
        src = f"{input_directory}/{filename}"
        dst = f"{input_directory}/{dst}"

        os.rename(src, dest)
    
    if filename.startswith("tshirt_"):
        countTshirt+=1
        dst = f"tshirt_{str(countTshirt)}.jpg"
        src = f"{input_directory}/{filename}"
        dst = f"{input_directory}/{dst}"

        os.rename(src, dest)

    if filename.startswith("tv_"):
        countTv+=1
        dst = f"tv_{str(countTv)}.jpg"
        src = f"{input_directory}/{filename}"
        dst = f"{input_directory}/{dst}"

        os.rename(src, dest)

