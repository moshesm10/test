'use strict';

fetch('./getdbdata.php')
.then(res => res.json())
.then(json => {
    const tableHeader = document.querySelector('.data-table');

    json.forEach(commit => {
        tableHeader.innerHTML += `
        <tr class="data-table__header">
          <td>${commit.timestamp}</td>
          <td>${commit.username}</td>
          <td>${commit.message}</td>
          <td>${commit.url}</td>
        </tr>
    `;
    });

    let test = "refs/heads/moshesm_first";
    test.split('/');
    console.log(test.split('/')[-1]);
});