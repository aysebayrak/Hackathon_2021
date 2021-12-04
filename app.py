from flask import Flask, render_template,request
import joblib
import numpy as np
from flask_restful import Api, Resource, reqparse
import pandas as pd



app = Flask(__name__)
 
api = Api(app)



class Tahmin(Resource):
    def get(self):
        data = pd.read_excel('veriler.xlsx')
        data = data.to_dict('records')
        return {'data' : data}, 
    
    
  def post(self):
        parser = reqparse.RequestParser()
        parser.add_argument('bolge', required=True)
        parser.add_argument('nem', required=True)
        parser.add_argument('kuraklık', required=True)
        parser.add_argument('yıl', required=True)
        args = parser.parse_args()

        data = pd.read_csv('users.csv')

        new_data = pd.DataFrame({
            'bolge'      : [args['bolge']],
            'nem'       : [args['nem']],
            'kuraklık'      : [args['kuraklık']],
            'yıl'      : [args['yıl']]
        })

        data = data.append(new_data, ignore_index = True)
        data.read_excel('veriler.xlsx', index=False)
        return {'data' : new_data.to_dict('records')}, 201

@app.route('/')
def home():
   
    
    
    
    

   ''' 
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

'''
if __name__ == '__main__':
    app.run(debug = True)
