function myPopup(province, data) {
    return(
        `<div>
            <table class='table table-hover'>
                <tr>
                    <td>Kabupaten</td>
                    <td>: ${province}</td>
                </tr>
                <tr>
                    <td>Jumlah Bencana</td>
                    <td>: ${data}</td>
                </tr>
            </table>
        </div>`
    )
}