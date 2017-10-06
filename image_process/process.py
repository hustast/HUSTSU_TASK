# -*- coding: utf-8 -*-

import cv2 as cv
import numpy as np
import sys

def process_image(input_image_path, model_type, generate_path):
    image = cv.imread(input_image_path)
    if model_type == 0:
        model_image_path = '/var/www/html/HustAvatar/image_process/models/model0.png'
    else:
        model_image_path = '/var/www/html/HustAvatar/image_process/models/model1.png'

    model_image = cv.imread(model_image_path)

    for i in range(300):
        for j in range(300):
            if sum(model_image[i,j]) != 0:
                image[i, j,:] = model_image[i, j,:]

    cv.imwrite(generate_path, image)


if __name__ == '__main__':

    input_path = sys.argv[1]
    model_type = int(sys.argv[2])
    gen_path = sys.argv[3]

    process_image(input_path, model_type, gen_path)