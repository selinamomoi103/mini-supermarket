<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    display:flex;
    min-height:100vh;
    background:#f4f6f9;
}

.sidebar{
    width:250px;
    background:#1e293b;
    color:white;
    padding:20px;
}

.sidebar h2{
    margin-bottom:30px;
    text-align:center;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    padding:15px;
    margin:10px 0;
    border-radius:8px;
    cursor:pointer;
    transition:0.3s;
}

.sidebar ul li:hover{
    background:#334155;
}

.main{
    flex:1;
    padding:20px;
}

.header{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card h3{
    color:#64748b;
    margin-bottom:10px;
}

.card p{
    font-size:28px;
    font-weight:bold;
    color:#0f172a;
}

.table-section{
    margin-top:30px;
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    text-align:left;
    border-bottom:1px solid #ddd;
}

th{
    background:#f8fafc;
}
</style>
</head>

<body>

<div class="sidebar">
    <h2>My Dashboard</h2>
    <ul>
        <li>Home</li>
        <li>Analytics</li>
        <li>Users</li>
        <li>Orders</li>
        <li>Settings</li>
    </ul>
</div>

<div class="main">
    <div class="header">
        <h1>Dashboard Overview</h1>
        <p>Welcome back!</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Users</h3>
            <p id="users">1,250</p>
        </div>

        <div class="card">
            <h3>Revenue</h3>
            <p>$12,400</p>
        </div>

        <div class="card">
            <h3>Orders</h3>
            <p>340</p>
        </div>

        <div class="card">
            <h3>Visitors</h3>
            <p>8,900</p>
        </div>
    </div>

    <div class="table-section">
        <h2>Recent Activity</h2>
        <br>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Placed an Order</td>
                    <td>2026-06-04</td>
                </tr>
                <tr>
                    <td>Mary Smith</td>
                    <td>Registered</td>
                    <td>2026-06-03</td>
                </tr>
                <tr>
                    <td>David Kim</td>
                    <td>Updated Profile</td>
                    <td>2026-06-02</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
// Example dynamic update
setTimeout(() => {
    document.getElementById("users").textContent = "1,275";
}, 3000);
</script>

</body>
</html>