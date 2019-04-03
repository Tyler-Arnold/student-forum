<div class="calendar">
    <table>
        <tr><th colspan="7"><?php echo date('F'); ?></th></tr>
        <tr>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
            <th>Sun</th>
        </tr>

        <?php
        $iterator = 0;
        for($i=1; $i<=6; $i++): //run for each row of the calendar
        ?>
        <tr> <!-- Start of row -->

        <?php
            for($x=1; $x<=7; $x++): // run for each day of the week
                $class = $calendar[$iterator]["status"];
                $day = $calendar[$iterator]["day"];
                echo "<td class=\"$class\"><a href=\"#\">$day</a></td>";
                $iterator++;
            endfor;
        ?>

        </tr> <!-- End of row -->
        <?php
        endfor;
        ?>
    </table>
</div>
