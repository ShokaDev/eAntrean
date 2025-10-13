<!-- includes/sidebar.php -->
<?php
// From dashboard.php, we have $orgs
?>
<aside class="sidebar">
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#">Organisasi Saya</a>
            <ul class="ml-4">
                <?php foreach ($orgs as $org): ?>
                    <li><a href="org.php?id=<?php echo $org['id']; ?>"><?php echo $org['name']; ?> (<?php echo $org['type']; ?>)</a></li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li><a href="php/logout.php">Logout</a></li>
    </ul>
</aside>