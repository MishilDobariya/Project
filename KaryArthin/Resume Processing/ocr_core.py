try:  
    from PIL import Image
except ImportError:  
    import Image
import pytesseract

def ocr_core(filename):  
    """
    This function will handle the core OCR processing of images.
    """
    pytesseract.pytesseract.tesseract_cmd = r'E:\Project\KaryArthin\tesseract\tesseract.exe'
    text = pytesseract.image_to_string(Image.open(filename))  # We'll use Pillow's Image class to open the image and pytesseract to detect the string in the image
    return text
#print(ocr_core('img.png'))
text = ocr_core('img.png')
t = text.lower()

#if "java" in t:
 #   print("success")  