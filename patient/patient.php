<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="dashboard-container">
            <div class="logo-section">
                <div class="l1">
                    <img src="../Hospital LOGO.png" alt="" width="50px">
                </div>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="#"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-user-md"></i> Doctor</a></li>
                    <li><a href="#"><i class="fas fa-user-md"></i> Doctor list</a></li>
                    <li class="active"><a href="#"><i class="fas fa-procedures"></i> Patient</a></li>
                    <li><a href="#"><i class="fas fa-procedures"></i> Patient list</a></li>
                    <li><a href="#"><i class="fas fa-notes-medical"></i> Appointment list</a></li>
                </ul>
                </ul>
            </nav>


      <div class="form-container">
        <form>

            <div class="form-group">
                <label for="first-name">First Name <span style="color:red;">*</span></label>
                <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
            </div>

            <div class="form-group">
                <label for="last-name">Last Name <span style="color:red;">*</span></label>
                <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address <span style="color:red;">*</span></label>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone No</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone No">
            </div>

            <div class="form-group">
                <label for="blood-group">Blood Group <span style="color:red;">*</span></label>
                <select id="blood-group" name="blood-group">
                    <option value="">Select option</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    </select>
            </div>

            <div class="form-group inline-group">
                <label>Sex <span style="color:red;">*</span></label>
                <div class="radio-options">
                    <input type="radio" id="sex-male" name="sex" value="male" required>
                    <label for="sex-male">Male</label>

                    <input type="radio" id="sex-female" name="sex" value="female">
                    <label for="sex-female">Female</label>

                    <input type="radio" id="sex-other" name="sex" value="other">
                    <label for="sex-other">Other</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="address">Address <span style="color:red;">*</span></label>
                <textarea id="address" name="address" rows="4" placeholder="Address"></textarea>
            </div>
          
            <button type="submit">Save</button>

        </form>
    </div>

</body>
</html>
