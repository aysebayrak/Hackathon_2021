from flask import Flask, render_template,request
import joblib
import numpy as np
from flask_restful import Api, Resource, reqparse
import pandas as pd



app = Flask(__name__)
@app.route('/')
def home():
    return render_template(".html")
@app.route("/tahmin", methods=['POST'])
def get_data():
    model= open("Earthquake_model.pkl","rb")
    
    cLf=joblib.load(model)
    if request.method =="POST":
        bolge= request.form["bolge"]
        nem = request.form["nem"]
        mineral = request.form["mineral"]
        data= [np.array([bolge,nem,mineral])]
        
        prediction= clf.predict(data)
    return render_template()


if __name__ == '__main__':
    app.run()
    