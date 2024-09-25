<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form inputs
    $name = htmlspecialchars($_POST['Student_Name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $website = htmlspecialchars($_POST['website']);
    $cgpa = htmlspecialchars($_POST['cgpa']);
    
    // Determine CGPA evaluation
    if ($cgpa <= 2) {
        $cgpaEvaluation = "Bad";
    } elseif ($cgpa >= 2.1 && $cgpa <= 3) {
        $cgpaEvaluation = "Average";
    } elseif ($cgpa >= 3.1 && $cgpa <= 4) {
        $cgpaEvaluation = "Good";
    } else {
        $cgpaEvaluation = "Invalid CGPA";
    }
    
    // Check if files are uploaded
    if (isset($_FILES['picture']) && isset($_FILES['cv'])) {
        // Get picture size
        $pictureSize = $_FILES['picture']['size'];
        
        // Get CV MIME type
        $cvType = $_FILES['cv']['type'];
        
        // Convert picture size to KB
        $pictureSizeKB = $pictureSize / 1024;
        
        // Display the information
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Phone Number: " . $phone . "<br>";
        echo "Website: " . $website . "<br>";
        echo "CGPA: " . $cgpa . " (" . $cgpaEvaluation . ")<br>";
        echo "Picture Size: " . round($pictureSizeKB, 2) . " KB<br>";
        echo "CV Type: " . $cvType . "<br>";
    } else {
        echo "No files uploaded.";
    }
} else {
    echo "Form not submitted.";
}
?>