from flask import Flask
from flask_restful import Api
from flask_cors import CORS
from User import User
from ValidaCPF import ValidaCPF


app = Flask(__name__)
api = Api(app)

api.add_resource(User, "/user/<int:id>")
api.add_resource(ValidaCPF, "/validaCPF/<string:numbers>")
cors = CORS(app, resources={r"/user/*": {"origins": "*"}})
cors = CORS(app, resources={r"/validaCPF/*": {"origins": "*"}})
app.run(debug=True)
