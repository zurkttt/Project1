from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/input')
def input():
    return render_template('index.html')

@app.route('/process', methods=['POST'])
def output():
    last_name = request.form['lastName']
    first_name = request.form['firstName']
    sex = request.form['sex']
    institution = request.form['Institution']
    email = request.form['email']

    return render_template(
        'result.html',
        last_name=last_name,
        first_name=first_name,
        sex=sex,
        institution=institution,
        email=email
    )

if __name__ == '__main__':
    app.run(debug=True)
