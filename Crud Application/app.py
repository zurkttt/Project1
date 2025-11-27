from flask import Flask, request, flash, render_template, redirect, url_for
from flask_mysqldb import MySQL

app = Flask(__name__)
app.secret_key = "var"

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'student'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'
mysql = MySQL(app)

@app.route("/")
def index():
    cursor=mysql.connection.cursor()
    sql = "select * from student"
    cursor.execute(sql)
    data=cursor.fetchall()
    cursor.close()
    return render_template("index.html", data=data)

@app.route('/add', methods=['POST'])
def add():
    name = request.form['name']
    sex = request.form['sex']
    department = request.form['department']

    cursor = mysql.coonection.cursor()
    cursor.execute("INSERT INTO student (name, sex, department) BALUES (%s, %s, %s)",
                   (name, sex, department))
    mysql.connection.commit()
    flash('Student Added!')
    return redirect(url_for('index'))

@app.route('/update', methods=['POST'])
def update():
    student_id = request.form['student_id']
    name = request.form['name']
    sex = request.form['sex']
    department = request.form['department']

    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE student SET name = %s, sex = %s, department = %s WHERE student_id = %s",
                   (name, sex, department, student_id))
    mysql.connection.commit()
    flash('Student Updated')
    return redirect(url_for('index'))

@app.route('/delete/int:id>')
def delete():
    cursor = mysql.connection.cursor()
    cursor.execute("DELETE FROM student WHERE student_id = %s",
                   (id,))
    
    if __name__ == '__main__':
        app.run(debug=True)
