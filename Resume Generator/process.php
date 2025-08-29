<?php
$imagePath = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';
    $education = $_POST['education'];
    $edu_year = $_POST['edu_year'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $work_year = $_POST['work_year'];
    $job_role = $_POST['job_role'];

    // Handle image upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir);
        }
        $fileName = basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . uniqid() . "_" . $fileName;

        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowed)) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath);
            $imagePath = $targetFilePath;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 25px 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .inline-inputs {
            display: flex;
            gap: 10px;
        }

        .inline-inputs input {
            flex: 1;
        }

        .radio-group {
            margin-top: 5px;
        }

        .radio-group input {
            margin-right: 5px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button {
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .resume {
            margin-top: 40px;
            border-top: 2px solid #007bff;
            padding-top: 20px;
        }

        .resume-header {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .resume-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .resume h3 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .section {
            margin-top: 25px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
        }

        .resume-info {
            line-height: 1.7;
        }

        .print-button {
            margin-top: 20px;
            background-color: #28a745;
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .resume, .resume * {
                visibility: visible;
            }
            .resume {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Resume Generator</h2>

    <form method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <div class="inline-inputs">
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="middlename" placeholder="Middle Name" required>
        </div>

        <label>Sex:</label>
        <div class="radio-group">
            <input type="radio" name="sex" value="Male" required> Male
            <input type="radio" name="sex" value="Female"> Female
        </div>

        <label>Address:</label>
        <input type="text" name="address" required>

        <label>Mobile Phone:</label>
        <input type="text" name="mobile" required>

        <label>Skills:</label>
        <select name="skills[]" multiple required>
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>
            <option value="JavaScript">JavaScript</option>
            <option value="Java">Java</option>
            <option value="PHP">PHP</option>
            <option value="C++">C++</option>
        </select>

        <label>Education:</label>
        <div class="inline-inputs">
            <input type="text" name="education" placeholder="School Last Attended" required>
            <input type="text" name="edu_year" placeholder="Inclusive Year of Attendance" required>
        </div>

        <label>Work Experience:</label>
        <div class="inline-inputs">
            <input type="text" name="company" placeholder="Company Name" required>
            <input type="text" name="position" placeholder="Job Position" required>
            <input type="text" name="work_year" placeholder="Inclusive Year" required>
        </div>

        <label>Job Role:</label>
        <textarea name="job_role" rows="4" required></textarea>

        <label>Upload Photo:</label>
        <input type="file" name="photo" accept="image/*" required>

        <button type="submit">Generate Resume</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <div class="resume" id="resume">
        <div class="resume-header">
            <?php if ($imagePath): ?>
                <img src="<?= $imagePath ?>" class="resume-photo" alt="Profile Photo">
            <?php endif; ?>
            <div>
                <h3><?= strtoupper($firstname . " " . $middlename . " " . $lastname) ?></h3>
                <p><strong>Sex:</strong> <?= $sex ?></p>
                <p><strong>Address:</strong> <?= $address ?></p>
                <p><strong>Mobile:</strong> <?= $mobile ?></p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Skills</div>
            <p><?= $skills ?></p>
        </div>

        <div class="section">
            <div class="section-title">Education</div>
            <p><strong><?= $education ?></strong> (<?= $edu_year ?>)</p>
        </div>

        <div class="section">
            <div class="section-title">Work Experience</div>
            <p>
                <strong><?= $company ?></strong> - <?= $position ?> (<?= $work_year ?>)<br>
                <?= nl2br(htmlspecialchars($job_role)) ?>
            </p>
        </div>
    </div>

    <button class="print-button" onclick="window.print()">Print Resume</button>
    <?php endif; ?>
</div>

</body>
</html>
