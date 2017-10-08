<h1>Welcome to Albatros Airlines!</h1>
<div id="body">
    <h2 style="text-align: center">Number of planes: {no_planes}</h2>
    <h2 style="text-align: center">Number of flights: {no_flights}</h2>
    <div style="text-align: center; list-style-type: none;">
    <h2>Number of planes: {no_planes}</h2>
    <h2>Number of flights: {no_flights}</h2>

    <div>
        <h2> List of airports:
            {airports}
            <li>Base Airport: {base}</li>
            <li>Destination 1: {dest1}</li>
            <li>Destination 2: {dest2}</li>
            <li>Destination 3: {dest3}</li>
            {/airports}
        </h2>
        {all_flights}
            {key}
            {departureLocation}
       {/all_flights}
    </div>
</div>