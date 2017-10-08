<div class="row">
    <div class="span4">
        <table>
            <tr><th>Dashboard</th></tr>
        </table>
       {all_flights}
        <table>
        <tr>
            <th>Flight {aircraftCode}</th>
            <th>departing from {departureLocation} to</th>
            <th>{destinationLocation}</th>
        </tr>
        </table>
        <br>
        {/all_flights}

    </div>
</div>

<?php

