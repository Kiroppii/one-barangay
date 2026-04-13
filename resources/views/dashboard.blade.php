<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Dashboard | OneBarangay</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Request a Certificate</h2>
        
        <div id="statusMessage" class="hidden mb-4 p-4 rounded text-white font-semibold"></div>

        <form id="certificateForm">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Certificate Type</label>
                <select id="type" class="w-full p-2 border rounded" required>
                    <option value="" disabled selected>Select a document...</option>
                    <option value="Barangay Clearance">Barangay Clearance</option>
                    <option value="Certificate of Indigency">Certificate of Indigency</option>
                    <option value="Business Permit">Business Permit</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Purpose</label>
                <textarea id="purpose" class="w-full p-2 border rounded" rows="3" placeholder="e.g., For Local Employment" required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
                Submit Request
            </button>
        </form>
    </div>

    <script>
        document.getElementById('certificateForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent standard page reload

            // 1. Gather the data from the form
            const payload = {
                user_id: 1, // Hardcoded to our dummy user for now
                certificate_type: document.getElementById('type').value,
                purpose: document.getElementById('purpose').value
            };

            // 2. Send the data to our Laravel API endpoint
            fetch('/api/certificates', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                // 3. Handle the API response
                const msgBox = document.getElementById('statusMessage');
                msgBox.classList.remove('hidden', 'bg-red-500', 'bg-green-500');
                
                if(data.message) {
                    msgBox.classList.add('bg-green-500');
                    msgBox.innerText = data.message;
                    document.getElementById('certificateForm').reset(); // Clear the form
                } else {
                    msgBox.classList.add('bg-red-500');
                    msgBox.innerText = "Error: Please check your inputs.";
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>