<?php 
class tables{
    public function display_users_table($conn, $ObjGlob) {
        ?>
        <div class="row align-items-md-stretch">
            <div class="col-md-12">
                <h2>Users List</h2>
                <?php
                print $ObjGlob->getMsg('msg'); // Handle any global messages
                ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // SQL Query to fetch users
                        $query = "SELECT fullname, email FROM users";
                        
                        // Using the select_while method to fetch multiple rows
                        $result = $conn->select_while($query);
                        
                        // Check if any results are returned
                        if (!empty($result)) {
                            $counter = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $counter++; ?></th>
                                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3">No users found</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
}