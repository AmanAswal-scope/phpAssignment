<?php
$html = '<table class="user-table">';
        $html .= '<tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>address</th>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact Number</th>
            <th>created_datetime</th>
            </tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td>' . $row['first_name'] . '</td>';
            $html .= '<td>' . $row['last_name'] . '</td>';
            $html .= '<td>' . $row['address'] . '</td>';
            $html .= '<td>' . $row['id'] . '</td>';
            $html .= '<td>' . $row['email'] . '</td>';
            $html .= '<td>' . $row['password'] . '</td>';
            $html .= '<td>' . $row['phone_number'] . '</td>';
            $html .= '<td>' . $row['created_datetime'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $this->pagination->getTotalPages(); $i++) {
            $html .= '<a href="admin.php?page=' . $i . '">' . $i . '</a> ';
        }
        $html .= '</div>';
        $html .= '<form class="search-form" method="GET" action="admin.php">';
        $html .= '<input type="text" name="search" placeholder="Search by email or phone number" value="' . (isset($_GET['search']) ? $_GET['search'] : '') . '">';
        $html .= '<button type="submit">Search</button>';
        $html .= '</form>';

        ?>