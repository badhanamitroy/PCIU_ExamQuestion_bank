<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #faf6dc;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 30px;
        }

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: 20px auto;
            text-align: left;
            border: 2px solid #c9c9c9;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 10px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            border: 1px solid #bbb;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fff5cc;
        }

        .full-width {
            width: 100%;
        }

        .file-upload {
            width: 100%;
            height: 180px;
            border: 2px dashed #bbb;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            transition: 0.3s;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .file-upload:hover {
            background-color: #e9f7e9;
            border-color: #4CAF50;
        }

        .file-upload input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-content {
            text-align: center;
        }

        .upload-icon {
            font-size: 40px;
            color: #4CAF50;
        }

        .upload-text {
            font-size: 14px;
            color: #666;
        }

        .preview-container {
            display: none;
            width: 100%;
            height: 100%;
        }

        .preview-container img,
        .preview-container iframe {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .upload-btn, .submit-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .upload-btn {
            background-color: #4CAF50;
            color: white;
        }

        .submit-btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Dear Student,<br>Please fill up this form with question info & Upload your Questions</h2>

        <div class="form-container">
            <form id="uploadForm">
                <div class="input-group">
                    <select required>
                        <option value="" disabled selected>Department</option>
                        <option>CSE</option>
                        <option>EEE</option>
                    </select>
                    <select required>
                        <option value="" disabled selected>Batch</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                    <select required>
                        <option value="" disabled selected>Module</option>
                        <option>Module 1</option>
                        <option>Module 2</option>
                    </select>
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Shift">
                    <input type="text" placeholder="Section">
                    <select required>
                        <option value="" disabled selected>Module Title</option>
                        <option>Summer</option>
                        <option>Fall</option>
                        <option>Spring</option>
                    </select>
                    <select required>
                        <option value="" disabled selected>Year</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                    </select>
                </div>

                <div class="input-group">
                    <select required>
                        <option value="" disabled selected>Course Code</option>
                        <option>CSE101</option>
                        <option>EEE102</option>
                    </select>
                    <input type="text" placeholder="Course Title">
                </div>

                <input type="text" placeholder="Course Teacher (Full Name)" class="full-width" required>

                <!-- File Upload Box -->
                <label class="file-upload" id="drop-area">
                    <input type="file" id="fileInput" accept="image/*, .pdf">
                    <div class="upload-content">
                        <div class="upload-icon">&#128206;</div>
                        <p class="upload-text">Drag & Drop or Click to Upload</p>
                    </div>
                    <div class="preview-container" id="preview-container"></div>
                </label>

                <button type="button" class="upload-btn" onclick="uploadMore()">Upload Another File</button>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function uploadMore() {
            document.getElementById("fileInput").value = "";
            document.getElementById("preview-container").style.display = "none";
            document.querySelector(".upload-content").style.display = "block";
        }

        document.getElementById("uploadForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Form submitted successfully!");
        });

        // Drag & Drop Upload Feature
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileInput");

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("drag-over");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("drag-over");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("drag-over");

            let files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                displayPreview(files[0]);
            }
        });

        fileInput.addEventListener("change", () => {
            if (fileInput.files.length > 0) {
                displayPreview(fileInput.files[0]);
            }
        });

        function displayPreview(file) {
            let previewContainer = document.getElementById("preview-container");
            let uploadContent = document.querySelector(".upload-content");
            let reader = new FileReader();

            reader.onload = function(e) {
                if (file.type.startsWith("image")) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
                } else if (file.type === "application/pdf") {
                    previewContainer.innerHTML = `<iframe src="${e.target.result}"></iframe>`;
                }
                previewContainer.style.display = "block";
                uploadContent.style.display = "none";
            };
            reader.readAsDataURL(file);
        }
    </script>

</body>
</html>
