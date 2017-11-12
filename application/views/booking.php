<h1>Bookings</h1>

<form action="/booking/search/" method="post">
<table>
    <tr>
        <th>Departure Location</th>
        <th>Destination Location</th>
    </tr>
    <tr>
        <td>
            <select name='from'>
            {places}
                <option value='{id}'>{community}</option>
            {/places}
            </select>
        </td>
        <td>
            <select name='to'>
            {places}
                <option value='{id}'>{community}</option>
            {/places}
            </select>
        </td>
    </tr>
</table>
<input type="submit" value="Search Flights" />
</form>
