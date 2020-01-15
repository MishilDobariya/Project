"""try:  
    from PIL import Image
except ImportError:  
    import Image
import pytesseract

def ocr_core(filename):  
    
    pytesseract.pytesseract.tesseract_cmd = r'E:\Project\OCR\tesseract\tesseract.exe'
    text = pytesseract.image_to_string(Image.open(filename))  # We'll use Pillow's Image class to open the image and pytesseract to detect the string in the image
    return text

print(ocr_core('img.png'))  """

word =  ['technical skills:', '', '‘© programming languages: c', 'c++', 'c+++','java', 'html']
words = " ".join(word)
cc = ['c++','cpp']
if 'c++' in cc:
    print("hello")