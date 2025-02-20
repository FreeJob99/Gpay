<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gpay Code Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h2 {
            color: #333;
        }
        .code-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            margin: 5px 0;
        }
        .copy-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        .copy-btn:hover {
            background: #0056b3;
        }
        .btn-container {
            margin-top: 15px;
        }
        .generate-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .generate-btn:hover {
            background: #218838;
        }
    </style>
    <script>
        function generateRandomNumbers(forceGenerate = false) {
            if (!forceGenerate && localStorage.getItem("generatedCodes")) {
                document.getElementById("codes").innerHTML = localStorage.getItem("generatedCodes");
                return;
            }

            let data = [
                "M471104421xxxxB261&",
                "M471027416xxxxB161@",
                "M411010802xxxxC128%",
                "M411017306xxxxA169@",
                "M401006503xxxxC268&"
            ];

            let updatedData = data.map(line => line.replace("xxxx", Math.floor(1000 + Math.random() * 9000)));

            let finalHTML = updatedData.map((code, index) => 
                `<div class="code-box">
                    <span id="code-${index}">${code}</span>
                    <button class="copy-btn" onclick="copyCode('code-${index}')">Copy</button>
                </div>`
            ).join("");

            localStorage.setItem("generatedCodes", finalHTML);
            document.getElementById("codes").innerHTML = finalHTML;
        }

        function resetAndGenerateNew() {
            localStorage.removeItem("generatedCodes");
            generateRandomNumbers(true);
        }

        function copyCode(id) {
            let text = document.getElementById(id).innerText;
            navigator.clipboard.writeText(text).then(() => {
                window.location.href = "https://t.me/Easytaskearnig"; // Instant Redirect to Telegram
            });
        }
    </script>
</head>
<body onload="generateRandomNumbers()">
    <div class="container">
        <h2>Generated Codes</h2>
        <div id="codes">Loading...</div>
        <div class="btn-container">
            <button class="generate-btn" onclick="resetAndGenerateNew()">Generate New</button>
        </div>
    </div>
</body>
</html>