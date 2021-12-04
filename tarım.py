import pandas as pd
import numpy as np
import matplotlib.pyplot as plt 


veriler= pd.read_excel("veriler.xlsx")
print(veriler)
bolge=veriler.iloc[:,0:1].values
print(bolge)

from sklearn import preprocessing
#1,2,3 :LabelEncoder() 
le=preprocessing.LabelEncoder()
bolge[:,0]=le.fit_transform(veriler.iloc[:,0])
print(bolge)

from sklearn import preprocessing
#1,2,3 :LabelEncoder() 
le=preprocessing.LabelEncoder()
x=veriler.iloc[:,4:5].values
x[:,0]=le.fit_transform(veriler.iloc[:,4:5])
print(x)

'''
from sklearn.compose import ColumnTransformer
from sklearn.preprocessing import OneHotEncoder
ct= ColumnTransformer(transformers=[('encoder' ,OneHotEncoder(),[0])],remainder='passthrough')
x=veriler.iloc[:,4:5].values
x= np.array(ct.fit_transform(x))
print(x)
'''

#sonuc= pd.DataFrame(data=bolge,index=range(20),columns=[''])

#sonuc=pd.DataFrame(data=)


sonuc=pd.DataFrame(data=x, index=range(21),columns=['yıl'])
print(sonuc)

nem=veriler.iloc[:,1:2].values
sonuc1=pd.DataFrame(data=nem,index=range(21),columns=["nem"])
print(nem)
s=pd.concat([sonuc,sonuc1],axis=1)



kuraklık=veriler.iloc[:,2:3].values
sonuc2=pd.DataFrame(data=kuraklık,index=range(21),columns=["kuraklık"])
print(kuraklık)

mineral=veriler.iloc[:,3:4].values
sonuc3=pd.DataFrame(data=mineral,index=range(21),columns=["mineral"])
print(mineral)

s1=pd.concat([sonuc2,sonuc3],axis=1)
sonuc3=pd.DataFrame(data=bolge,index=range(21),columns=["bolge"])
s2=pd.concat([s1,sonuc3],axis=1)
print(s2)

#son
s3=pd.concat([s2,s],axis=1)
toprakverimi=veriler.iloc[:,-1].values
sonuc4=pd.DataFrame(data=toprakverimi,index=range(21),columns=["toprakverimi"])



from sklearn.model_selection import train_test_split
x_train,x_test,y_train,y_test=train_test_split(s3,sonuc4,test_size=0.33,random_state=0)


from sklearn.linear_model import LinearRegression
regrassor= LinearRegression()
regrassor.fit(x_train,y_train)
y_pred =regrassor.predict(x_test)



'''
plt.scatter(x_train,y_train,color ='red')
plt.plot(x_train,regrassor.predict(x_train),color='blue')
plt.show()
'''
from sklearn.metrics import r2_score
print(r2_score(sonuc4,regrassor.predict(s3)))




kurak=int(input("Kuraklık değerini giriniz :"))

tahmin=regrassor.predict([[kurak,64,6,2,27]])
print(tahmin)
    






