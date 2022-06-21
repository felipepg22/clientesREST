from flask import Flask
from flask_restful import Api
from User import User








app = Flask(__name__)
api = Api(app)

api.add_resource(User, "/user/<int:id>")
app.run(debug=True)
