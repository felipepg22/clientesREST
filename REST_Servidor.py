from flask import Flask
from flask_restful import Api
from User import User
from ValidaCPF import ValidaCPF







app = Flask(__name__)
api = Api(app)

api.add_resource(User, "/user/<int:id>")
api.add_resource(ValidaCPF, "/validaCPF/<string:numbers>")
app.run(debug=True)
