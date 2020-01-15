import PyPDF2
def pdftotext(file):
       # pdfFileObj = urllib.urlopen("").read()
        pdfFileObj = open(file, 'rb')
        pdfReader = PyPDF2.PdfFileReader(pdfFileObj)
        text = ""
        num_pages = pdfReader.numPages
        count = 0
        while count < num_pages:
            pageObj = pdfReader.getPage(count)
            count +=1
            text += pageObj.extractText()
        pdfFileObj.close() 
        return text

