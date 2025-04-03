<?php
session_start();

include 'connectDB.php';

if (isset($_POST['Submit'])) {

// declaring input variables
$Department = mysqli_real_escape_string($connection, $_POST['Department']);
$Batch = mysqli_real_escape_string($connection, $_POST['Batch']);
$section = mysqli_real_escape_string($connection, $_POST['section']);
$Shift = mysqli_real_escape_string($connection, $_POST['Shift']);
$Module = mysqli_real_escape_string($connection, $_POST['Module']);
$ModuleTitle = mysqli_real_escape_string($connection, $_POST['ModuleTitle']);
$Year = mysqli_real_escape_string($connection, $_POST['Year']);
$Term = mysqli_real_escape_string($connection, $_POST['Term']);
$CourseCode = mysqli_real_escape_string($connection, $_POST['CourseCode']);
$CourseTitle = mysqli_real_escape_string($connection, $_POST['CourseTitle']);
$CourseTeacher = mysqli_real_escape_string($connection, $_POST['CourseTeacher']);

// file upload handle section
if ($_FILES['fileInput']){
    $path = $_FILES['fileInput']['name']; //detect file name
    // echo $path; // shows file name
    $upload_path = './uploads/'.$path; //direct file path
    // echo $upload_path; //shows file upload path
    move_uploaded_file($_FILES['fileInput']['tmp_name'], $upload_path); // moves file from temp location to upload path
    // echo "File uploaded successfully";
}
// file upload handle section

$sql = "INSERT INTO questioninfo(StudentName, Department, Batch, Section, Shift, Module, ModuleTitle, Year, Term, CourseCode, CourseTitle, CourseTeacher, Question, Status)
        VALUES ('Admin', '$Department', '$Batch', '$section', '$Shift', '$Module', '$ModuleTitle', '$Year', '$Term', '$CourseCode', '$CourseTitle', '$CourseTeacher', '$path', 'Approved')";

$result = mysqli_query($connection, $sql);

if ($result) {
    echo "<script type='text/javascript'>
        var userChoice = confirm('Your question uploaded successfully! Wanna add more?');
        if (userChoice) {
            window.location.href = 'adminquesupload.php';
        } else {
            window.location.href = 'adminworkspace.php';
        }
    </script>";
} else {
    echo "Error: ". $sql. "<br>". mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Upload</title>
    <link rel="stylesheet" href="./css files/universal.css">
    <link rel="stylesheet" href="./css files/QuesUpload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- <h2>Hello <span><?php echo htmlspecialchars($_SESSION['StudentName']); ?></span></h2> -->
    <div class="header">
        <br>
        <h1>Hello Admin</h1>
        <p>Please fillup the form to upload your questions.</p>
        <br>
        <hr>
        <br>
    </div>
    <!-- <h3></h3> -->


    <form action="" method="post" enctype="multipart/form-data">
        <div class="formContainer">
            <div class="formInputs">
                <div class="row1">
                    <select name="Department" required>
                        <option value="" disabled selected>Department</option>
                        <option>Computer Science and Engineering</option>
                        <option>Electrical and Electronic Engineering</option>
                        <option>Civil Engineering</option>
                        <option>Textile Engineering</option>
                        <option>Fashion Design and Technology</option>
                        <option>English</option>
                        <option>Law</option>
                        <option>Natural Science</option>
                        <option>Business Administration</option>
                        <option>Journalism and Media Studies</option>
                    </select>
                    <select name="Batch" required>
                        <option value="" disabled selected>Batch</option>
                        <option>25</option><option>26</option><option>27</option><option>28</option><option>29</option>
                        <option>30</option><option>31</option><option>32</option><option>33</option><option>34</option>
                        <option>35</option><option>36</option><option>37</option><option>38</option><option>39</option>
                        <option>40</option>
                    </select>
                    <input type="text" name="section" placeholder="Section">
                    <select name="Shift" required>
                        <option value="" disabled selected>Shift</option>
                        <option>Day</option>
                        <option>Evening</option>
                    </select>
                </div>
                <div class="row2">
                    <select name="Module" required>
                        <option value="" disabled selected>Module</option>
                        <option>Semester</option>
                        <option>Trimester</option>
                    </select>
                    <select name="ModuleTitle" required>
                        <option value="" disabled selected>Module Title</option>
                        <option>Summer</option>
                        <option>Fall</option>
                        <option>Spring</option>
                    </select>
                    <input type="text" name="Year" placeholder="Year">
                    <select name="Term" required>
                        <option value="" disabled selected>Term</option>
                        <option>Midterm</option>
                        <option>Final term</option>
                    </select>
                </div>
                <div class="row3">
                    <input type="text" name="CourseTitle" placeholder="Course Title">
                    <input type="text" name="CourseCode" placeholder="Course Code">
                </div>
                <div class="row4">
                    <input type="text" name="CourseTeacher" placeholder="Course Teacher (Full Name)">
                </div>
                <div class="row5">
                    <label class="file-upload" id="drop-area">
                        <input type="file" id="fileInput" name="fileInput" accept=".pdf,image/jpeg,image/png">
                        <div class="upload-content">
                            <i class="fa-solid fa-upload"></i>
                            <p class="upload-text">Drag & Drop or Click to Upload</p>
                        </div>
                        <div class="preview-container" id="preview-container">

                        </div>
                    </label>
                </div>
            </div>
            <!-- <button type="submit" name="addMore">Want to add more?</button> -->
        </div>
        <button type="submit" name="Submit">Submit</button>
    </form>
    <a href="adminworkspace.php" style="
    background-color: #0056b3;
    color: white;
    position: fixed;
    bottom: 20px;
    left: 20px;
    height: 50px;
    width: 50px;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    text-decoration: none;">
    <i class="fa-solid fa-backward" style="font-size: 18px; color: white;"></i>
</a>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('preview-container');

        // Handle file input change
        fileInput.addEventListener('change', function() {
            previewFile(this.files[0]);
        });

        // Drag and drop events
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.style.borderColor = '#2980b9';
        });

        dropArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropArea.style.borderColor = '#bdc3c7';
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.style.borderColor = '#bdc3c7';
            fileInput.files = e.dataTransfer.files;
            previewFile(e.dataTransfer.files[0]);
        });

        function previewFile(file) {
            if (!file) return;

            const fileType = file.type;
            const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
            if (!validTypes.includes(fileType)) {
                alert('Only PDF, JPEG, and PNG files are allowed.');
                fileInput.value = '';
                return;
            }

            previewContainer.innerHTML = ''; // Clear previous preview
            const reader = new FileReader();

            reader.onload = function(e) {
                if (fileType === 'application/pdf') {
                    const embed = document.createElement('embed');
                    embed.src = e.target.result;
                    embed.type = 'application/pdf';
                    embed.width = '100%';
                    embed.height = '200px';
                    previewContainer.appendChild(embed);
                } else {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '200px';
                    previewContainer.appendChild(img);
                }
            };

            reader.readAsDataURL(file);
        }
    </script>

</body>
</html>