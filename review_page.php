<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Review Proposals</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Review Proposals</h2>
        <div id="proposals"></div>
    </div>
    <script>
        // Fetch and display proposals
        fetch('get_proposals.php')
            .then(response => response.json())
            .then(data => {
                let proposals = document.getElementById('proposals');
                data.forEach(proposal => {
                    let proposalDiv = document.createElement('div');
                    proposalDiv.classList.add('proposal');
                    proposalDiv.innerHTML = `
                        <h3>${proposal.event_name}</h3>
                        <p>${proposal.event_details}</p>
                        <button onclick="reviewProposal(${proposal.id}, 'approved')" class="btn btn-success">Approve</button>
                        <button onclick="reviewProposal(${proposal.id}, 'rejected')" class="btn btn-danger">Reject</button>
                    `;
                    proposals.appendChild(proposalDiv);
                });
            });

        function reviewProposal(id, status) {
            fetch('review_proposal.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id, status })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                location.reload();
            });
        }
    </script>
</body>
</html>
