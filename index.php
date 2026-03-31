<?php
// 1. Membuat Class "Pengguna" 
class Pengguna {
    // Menyiapkan variabel untuk menyimpan data
    public $firstName;
    public $lastName;
    public $phone;
    public $address;

    // Method __construct 
    public function __construct($inputFirst, $inputLast, $inputPhone, $inputAddress) {
        $this->firstName = $inputFirst;
        $this->lastName = $inputLast;
        $this->phone = $inputPhone;
        $this->address = $inputAddress;
    }

    public function tampilkanData() {
        echo "<div style='margin-top: 30px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;'>";
        echo "<p>Hi, my name is <strong>" . htmlspecialchars($this->firstName . " " . $this->lastName) . "</strong></p>";
        echo "<p>Phone Number : " . htmlspecialchars($this->phone) . "</p>";
        echo "<p>Address : " . nl2br(htmlspecialchars($this->address)) . "</p>";
        echo "<br><a href='index.php' style='color: grey; text-decoration: none;'>Reset</a>";
        echo "</div>";
    }
}

// 2. POST
$hasilForm = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $hasilForm = new Pengguna(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['phone'],
        $_POST['address']
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input PHP - OOP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 50px; display: flex; justify-content: center; }
        .container { width: 500px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 30px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: #555;}
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100px; padding: 10px; background-color: #4da6ff; color: white; border: none; border-radius: 20px; cursor: pointer; display: block; margin: 0 auto; }
        button:hover { background-color: #3385ff; }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstname" placeholder="Firstname" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastname" placeholder="Lastname" required>
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <textarea name="address" rows="3" placeholder="Address" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php
    // 4. Menampilkan Hasil
    if ($hasilForm != null) {
        $hasilForm->tampilkanData();
    }
    ?>
</div>

</body>
</html>