import os.path  
from flask import Flask, render_template, request
import mysql.connector
import re
from datetime import datetime
import os

# import our OCR function
from ocr_core import ocr_core

from pdftotext import pdftotext

# define a  to store and later serve the images
UPLOAD_FOLDER = ''

# allow files of a specific type
ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg','pdf','doc','docx'])

app = Flask(__name__,template_folder='template')

# function to check the file extension
def allowed_file(filename):  
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# route and function to handle the home page
@app.route('/')
def home_page():  
    return render_template('index.html')

# route and function to handle the upload page
@app.route('/jobs', methods=['GET', 'POST'])
def upload_page():  
    if request.method == 'POST':
        postFile = open('post.txt')
        # check if there is a file in the request
        if 'file' not in request.files:
            return render_template('upload.html', msg='No file selected')
        file = request.files['file']
        name = request.form['name']
        email = request.form['email']
        phone = request.form['phone']
        kw = request.form['kw']
        message = request.form['message']
        now = datetime.now()
        mydb = mysql.connector.connect(
                        host="localhost",
                        user="root",
                        passwd="",
                        database="Karyarthin"
                        )

        mycursor = mydb.cursor()

        sql = "INSERT INTO history (Name, Post, Email, Date,Phone, Message) VALUES (%s, %s, %s, %s, %s, %s)"
        val = (name, kw, email, now,phone, message)
        mycursor.execute(sql, val)
        mydb.commit()

        extension = os.path.splitext(file.filename)[1]
        # if no file is selected
        if file.filename == '':
            return render_template('upload.html', msg='No file selected')

        if file and allowed_file(file.filename):
            if(extension=='.png' or extension=='.jpeg' or extension=='.jpg'):

            # call the OCR function on it
                extracted_text = ocr_core(file)
            elif(extension=='.pdf'):
                extracted_text = pdftotext(file.filename)

            elif(extension=='.doc'):
                fname = doctopdf(file.filename)
                extracted_text = pdftotext(fname)
            # extract the text and display it

            extracted_text = extracted_text.lower()
            extracted_text =  re.split('; |, |\*|\n',extracted_text)
            extracted_text = ' '.join(extracted_text)
            """cc = ['c++', 'cpp']
            if kw in cc:
                if 'c+' in extracted_text:
                    mydb = mysql.connector.connect(
                            host="localhost",
                            user="root",    
                            passwd="",
                            database="Karyarthin"
                            )

                    mycursor = mydb.cursor()

                    sql = "INSERT INTO applicant (name, Keyword,Email) VALUES (%s, %s, %s)"
                    val = ("mishil", kw, "mmm")
                    mycursor.execute(sql, val)
               """     
            #if (extracted_text.find(kw) != -1):
            kw=kw.lower()
            f = open("C:\\xampp\\htdocs\\AdminPanel\\selected.txt",'r')
            ff = f.read()
            a = ff.split(",")
            rqr = list(a)
            while("" in rqr): 
                rqr.remove("") 
            if kw in extracted_text:
                if kw in rqr:
                    mydb = mysql.connector.connect(
                            host="localhost",
                            user="root",
                            passwd="",
                            database="Karyarthin"
                            )

                    mycursor = mydb.cursor()

                    sql = "INSERT INTO applicant (Name, Post, Email,Date, Phone, Message) VALUES (%s, %s, %s, %s, %s, %s)"
                    val = (name, kw, email,now, phone, message)
                    mycursor.execute(sql, val)
                    v = 1

                    mydb.commit()

            return render_template('upload.html',
                                   msg='Successfully processed',
                                   extracted_text=extracted_text,
                                   img_src=UPLOAD_FOLDER + file.filename,
                                   file=file.filename,
                                   extension=extension ,kw=kw
                                   )
    elif request.method == 'GET':
        # check if there is a file in the request
            return render_template('upload.html')

if __name__ == '__main__':  
    app.run()