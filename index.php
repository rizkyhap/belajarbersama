<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Yuk! 🎓</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('child.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            font-weight: 600;
            position: relative;
        }
        
        /* Overlay untuk memastikan kontras text */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
        }
        
        .main-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .menu-card, .game-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            padding: 30px;
            margin: 20px 0;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .menu-btn {
            width: 100%;
            height: 80px;
            border: none;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0;
            transition: transform 0.2s;
            color: white;
        }
        
        .menu-btn:hover {
            transform: scale(1.05);
        }
        
        .btn-reading { background: linear-gradient(45deg, #ff6b6b, #ff8e53); }
        .btn-math { background: linear-gradient(45deg, #4ecdc4, #44a08d); }
        .btn-guess { background: linear-gradient(45deg, #45b7d1, #96c93d); }
        .btn-sequence { background: linear-gradient(45deg, #f093fb, #f5576c); }
        
        .alphabet-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        
        .alphabet-display {
            font-size: 4rem;
            color: #ff6b6b;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .alphabet-lowercase {
            font-size: 3rem;
            color: #4ecdc4;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .syllable-display {
            font-size: 2rem;
            color: #4ecdc4;
            margin: 10px 0;
        }
        
        .math-problem {
            font-size: 1.8rem;
            color: #333;
            margin: 20px 0;
        }
        
        .math-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        
        .math-item {
            font-size: 2rem;
            margin: 5px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .answer-input {
            font-size: 2rem;
            text-align: center;
            border: 3px solid #4ecdc4;
            border-radius: 15px;
            padding: 10px;
            width: 100px;
        }
        
        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 20px 0;
        }
        
        .image-item {
            border: 3px solid transparent;
            border-radius: 10px;
            cursor: pointer;
            transition: border-color 0.2s;
            padding: 10px;
            background: #f8f9fa;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .image-item:hover {
            border-color: #45b7d1;
        }
        
        .image-item.selected {
            border-color: #28a745;
            background: #d4edda;
        }
        
        .sequence-display {
            font-size: 2rem;
            color: #f5576c;
            margin: 20px 0;
            font-weight: bold;
        }
        
        .control-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .control-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            font-size: 1.2rem;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        
        .btn-random { background: #ff6b6b; }
        .btn-back { background: #6c757d; }
        .btn-check { background: #28a745; }
        
        .hidden { display: none; }
        
        .result-message {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
            padding: 15px;
            border-radius: 10px;
        }
        
        .correct { background: #d4edda; color: #155724; }
        .incorrect { background: #f8d7da; color: #721c24; }
        
        .login-notes {
            margin-top: 20px;
        }
        
        .notes-box {
            background: white;
            border-radius: 15px;
            padding: 15px;
            border: 2px solid #e9ecef;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .notes-text {
            font-size: 0.9rem;
            color: #6c757d;
            margin: 0;
            line-height: 1.5;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Login Screen -->
        <div id="loginScreen" class="menu-card">
            <h1 class="text-center mb-4">🎓 Selamat Datang!</h1>
            <div class="mb-3">
                <label for="usernameInput" class="form-label">Siapa nama kamu?</label>
                <input type="text" class="form-control" id="usernameInput" placeholder="Tulis nama kamu di sini..." 
                       style="font-size: 1.2rem; padding: 15px; border-radius: 15px; border: 3px solid #4ecdc4;">
            </div>
            <button class="btn btn-success btn-lg" onclick="login()" style="width: 100%; padding: 15px; font-size: 1.2rem; border-radius: 15px;">
                <i class="fas fa-play"></i> Mulai Belajar!
            </button>
            
            <div class="login-notes mt-4">
                <div class="notes-box">
                    <p class="notes-text">
                        📝 Soal di dalam apps ini dikhususkan untuk anak di bawah 6 tahun<br>
                        👨‍👩‍👧‍👦 Ayah & Bunda harus memantau anak dalam belajar!
                    </p>
                </div>
            </div>
        </div>

        <!-- Menu Utama -->
        <div id="mainMenu" class="menu-card hidden">
            <h1 class="text-center mb-4">🎓 Hai <span id="displayUsername">Adik</span>! Belajar Yuk!</h1>
            <button class="menu-btn btn-reading" onclick="startReading()">
                <i class="fas fa-book"></i> Membaca
            </button>
            <button class="menu-btn btn-math" onclick="startMath()">
                <i class="fas fa-calculator"></i> Berhitung
            </button>
            <button class="menu-btn btn-guess" onclick="startGuessing()">
                <i class="fas fa-eye"></i> Menebak
            </button>
            <button class="menu-btn btn-sequence" onclick="startSequence()">
                <i class="fas fa-sort-numeric-up"></i> Urutan
            </button>
        </div>

        <!-- Game Membaca -->
        <div id="readingGame" class="game-card hidden">
            <h2 class="text-center">📖 Belajar Membaca</h2>
            <div class="alphabet-container">
                <div class="alphabet-display" id="alphabetDisplay">A</div>
                <div class="alphabet-lowercase" id="alphabetLowercase">a</div>
            </div>
            <div class="syllable-display" id="syllableDisplay">A - a</div>
            <div class="text-center">
                <p id="readingExample">Contoh: <strong>Apel</strong></p>
            </div>
        </div>

        <!-- Game Berhitung -->
        <div id="mathGame" class="game-card hidden">
            <h2 class="text-center">🔢 Berhitung</h2>
            <div class="text-center mb-3">
                <button class="btn btn-warning me-2" id="easyModeBtn" onclick="setMathMode('easy')">
                    <i class="fas fa-child"></i> Mudah
                </button>
                <button class="btn btn-danger" id="hardModeBtn" onclick="setMathMode('hard')">
                    <i class="fas fa-brain"></i> Sulit
                </button>
            </div>
            <div class="math-problem" id="mathProblem">5 mobil + 2 mobil = ?</div>
            <div class="math-visual" id="mathVisual">
                <div class="math-item">🚗🚗🚗🚗🚗</div>
                <div class="math-item">+</div>
                <div class="math-item">🚗🚗</div>
                <div class="math-item">=</div>
                <input type="number" class="answer-input" id="mathAnswer" placeholder="?">
            </div>
            <button class="btn btn-success btn-lg mt-3" onclick="checkMathAnswer()">
                <i class="fas fa-check"></i> Periksa
            </button>
            <div id="mathResult" class="result-message hidden"></div>
        </div>

        <!-- Game Menebak -->
        <div id="guessGame" class="game-card hidden">
            <h2 class="text-center">👁️ Tebak Gambar</h2>
            <p class="text-center">Pilih semua gambar <strong id="guessTarget">mobil</strong>!</p>
            <div class="image-grid" id="imageGrid">
                <div class="image-item" data-type="car" onclick="selectImage(this)">🚗 Mobil</div>
                <div class="image-item" data-type="tree" onclick="selectImage(this)">🌳 Pohon</div>
                <div class="image-item" data-type="car" onclick="selectImage(this)">🚙 Mobil</div>
                <div class="image-item" data-type="house" onclick="selectImage(this)">🏠 Rumah</div>
            </div>
            <button class="btn btn-success btn-lg mt-3" onclick="checkGuessAnswer()">
                <i class="fas fa-check"></i> Periksa
            </button>
            <div id="guessResult" class="result-message hidden"></div>
        </div>

        <!-- Game Urutan -->
        <div id="sequenceGame" class="game-card hidden">
            <h2 class="text-center">🔢 Urutan Angka</h2>
            <p class="text-center">Pilih urutan yang benar:</p>
            <div class="sequence-display" id="sequenceQuestion">Mana yang benar?</div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary btn-lg" onclick="selectSequence(this, 'A')">
                    A. <span id="optionA">12345</span>
                </button>
                <button class="btn btn-outline-primary btn-lg" onclick="selectSequence(this, 'B')">
                    B. <span id="optionB">65874</span>
                </button>
            </div>
            <div id="sequenceResult" class="result-message hidden"></div>
        </div>
    </div>

    <!-- Control Buttons -->
    <div class="control-buttons" id="controlButtons">
        <button class="control-btn btn-random" onclick="randomizeQuestion()" title="Acak Soal">
            <i class="fas fa-random"></i>
        </button>
        <button class="control-btn btn-back" onclick="goBack()" title="Kembali">
            <i class="fas fa-arrow-left"></i>
        </button>
    </div>

    <script>
        let currentGame = '';
        let currentMathAnswer = 0;
        let currentGuessTarget = '';
        let selectedImages = [];
        let correctSequence = '';
        let mathMode = 'hard'; // default mode sulit
        let currentReadingIndex = 0; // Track current position in alphabet
        let username = ''; // Store username

        // Data untuk setiap game
        const readingData = [
            { letter: 'A', lowercase: 'a', syllable: 'A - a', example: 'Apel 🍎' },
            { letter: 'B', lowercase: 'b', syllable: 'Ba - bi - bu', example: 'Bola ⚽' },
            { letter: 'C', lowercase: 'c', syllable: 'Ca - ci - cu', example: 'Cinta ❤️' },
            { letter: 'D', lowercase: 'd', syllable: 'Da - di - du', example: 'Dadu 🎲' },
            { letter: 'E', lowercase: 'e', syllable: 'E - e', example: 'Elang 🦅' },
            { letter: 'F', lowercase: 'f', syllable: 'Fa - fi - fu', example: 'Foto 📷' },
            { letter: 'G', lowercase: 'g', syllable: 'Ga - gi - gu', example: 'Gajah 🐘' },
            { letter: 'H', lowercase: 'h', syllable: 'Ha - hi - hu', example: 'Hari ☀️' },
            { letter: 'I', lowercase: 'i', syllable: 'I - i', example: 'Ikan 🐟' },
            { letter: 'J', lowercase: 'j', syllable: 'Ja - ji - ju', example: 'Jari ☝️' },
            { letter: 'K', lowercase: 'k', syllable: 'Ka - ki - ku', example: 'Kucing 🐱' },
            { letter: 'L', lowercase: 'l', syllable: 'La - li - lu', example: 'Lampu 💡' },
            { letter: 'M', lowercase: 'm', syllable: 'Ma - mi - mu', example: 'Mata 👁️' },
            { letter: 'N', lowercase: 'n', syllable: 'Na - ni - nu', example: 'Nanas 🍍' },
            { letter: 'O', lowercase: 'o', syllable: 'O - o', example: 'Orang 👤' },
            { letter: 'P', lowercase: 'p', syllable: 'Pa - pi - pu', example: 'Pohon 🌳' },
            { letter: 'Q', lowercase: 'q', syllable: 'Qa - qi - qu', example: 'Queen 👸' },
            { letter: 'R', lowercase: 'r', syllable: 'Ra - ri - ru', example: 'Rumah 🏠' },
            { letter: 'S', lowercase: 's', syllable: 'Sa - si - su', example: 'Sapi 🐄' },
            { letter: 'T', lowercase: 't', syllable: 'Ta - ti - tu', example: 'Topi 👒' },
            { letter: 'U', lowercase: 'u', syllable: 'U - u', example: 'Ular 🐍' },
            { letter: 'V', lowercase: 'v', syllable: 'Va - vi - vu', example: 'Vas 🏺' },
            { letter: 'W', lowercase: 'w', syllable: 'Wa - wi - wu', example: 'Wajah 😊' },
            { letter: 'X', lowercase: 'x', syllable: 'Xa - xi - xu', example: 'Xray 🦴' },
            { letter: 'Y', lowercase: 'y', syllable: 'Ya - yi - yu', example: 'Yoyo 🪀' },
            { letter: 'Z', lowercase: 'z', syllable: 'Za - zi - zu', example: 'Zebra 🦓' }
        ];

        const mathProblems = [
            { problem: '5 + 2 = ?', easyProblem: '5 mobil + 2 mobil = ?', visual: ['🚗🚗🚗🚗🚗', '+', '🚗🚗'], numbers: ['5', '+', '2'], answer: 7 },
            { problem: '2 + 7 = ?', easyProblem: '2 sapi + 7 sapi = ?', visual: ['🐄🐄', '+', '🐄🐄🐄🐄🐄🐄🐄'], numbers: ['2', '+', '7'], answer: 9 },
            { problem: '3 + 1 = ?', easyProblem: '3 kucing + 1 kucing = ?', visual: ['🐱🐱🐱', '+', '🐱'], numbers: ['3', '+', '1'], answer: 4 },
            { problem: '6 + 3 = ?', easyProblem: '6 burung + 3 burung = ?', visual: ['🐦🐦🐦🐦🐦🐦', '+', '🐦🐦🐦'], numbers: ['6', '+', '3'], answer: 9 },
            { problem: '4 + 2 = ?', easyProblem: '4 ikan + 2 ikan = ?', visual: ['🐟🐟🐟🐟', '+', '🐟🐟'], numbers: ['4', '+', '2'], answer: 6 },
            { problem: '1 + 4 = ?', easyProblem: '1 gajah + 4 gajah = ?', visual: ['🐘', '+', '🐘🐘🐘🐘'], numbers: ['1', '+', '4'], answer: 5 },
            { problem: '7 + 3 = ?', easyProblem: '7 apel + 3 apel = ?', visual: ['🍎🍎🍎🍎🍎🍎🍎', '+', '🍎🍎🍎'], numbers: ['7', '+', '3'], answer: 10 },
            { problem: '3 + 2 = ?', easyProblem: '3 bola + 2 bola = ?', visual: ['⚽⚽⚽', '+', '⚽⚽'], numbers: ['3', '+', '2'], answer: 5 },
            { problem: '8 + 4 = ?', easyProblem: '8 bintang + 4 bintang = ?', visual: ['⭐⭐⭐⭐⭐⭐⭐⭐', '+', '⭐⭐⭐⭐'], numbers: ['8', '+', '4'], answer: 12 },
            { problem: '2 + 6 = ?', easyProblem: '2 bunga + 6 bunga = ?', visual: ['🌺🌺', '+', '🌺🌺🌺🌺🌺🌺'], numbers: ['2', '+', '6'], answer: 8 },
            { problem: '4 + 4 = ?', easyProblem: '4 rumah + 4 rumah = ?', visual: ['🏠🏠🏠🏠', '+', '🏠🏠🏠🏠'], numbers: ['4', '+', '4'], answer: 8 },
            { problem: '1 + 2 = ?', easyProblem: '1 pesawat + 2 pesawat = ?', visual: ['✈️', '+', '✈️✈️'], numbers: ['1', '+', '2'], answer: 3 },
            { problem: '5 + 6 = ?', easyProblem: '5 hati + 6 hati = ?', visual: ['❤️❤️❤️❤️❤️', '+', '❤️❤️❤️❤️❤️❤️'], numbers: ['5', '+', '6'], answer: 11 }
        ];

        const guessProblems = [
            {
                target: 'mobil',
                items: [
                    { text: '🚗 Mobil', type: 'car', correct: true },
                    { text: '🌳 Pohon', type: 'tree', correct: false },
                    { text: '🚙 Mobil', type: 'car', correct: true },
                    { text: '🏠 Rumah', type: 'house', correct: false }
                ]
            },
            {
                target: 'hewan',
                items: [
                    { text: '🐱 Kucing', type: 'animal', correct: true },
                    { text: '🌺 Bunga', type: 'flower', correct: false },
                    { text: '🐶 Anjing', type: 'animal', correct: true },
                    { text: '🍎 Apel', type: 'fruit', correct: false }
                ]
            },
            {
                target: 'buah',
                items: [
                    { text: '🍎 Apel', type: 'fruit', correct: true },
                    { text: '⚽ Bola', type: 'toy', correct: false },
                    { text: '🍌 Pisang', type: 'fruit', correct: true },
                    { text: '📚 Buku', type: 'book', correct: false }
                ]
            },
            {
                target: 'makanan',
                items: [
                    { text: '🍕 Pizza', type: 'food', correct: true },
                    { text: '🚗 Mobil', type: 'car', correct: false },
                    { text: '🍔 Burger', type: 'food', correct: true },
                    { text: '🌳 Pohon', type: 'tree', correct: false }
                ]
            },
            {
                target: 'mainan',
                items: [
                    { text: '⚽ Bola', type: 'toy', correct: true },
                    { text: '🐱 Kucing', type: 'animal', correct: false },
                    { text: '🧸 Boneka', type: 'toy', correct: true },
                    { text: '🌺 Bunga', type: 'flower', correct: false }
                ]
            },
            {
                target: 'tumbuhan',
                items: [
                    { text: '🌳 Pohon', type: 'plant', correct: true },
                    { text: '🏠 Rumah', type: 'house', correct: false },
                    { text: '🌺 Bunga', type: 'plant', correct: true },
                    { text: '✈️ Pesawat', type: 'vehicle', correct: false }
                ]
            },
            {
                target: 'kendaraan',
                items: [
                    { text: '🚗 Mobil', type: 'vehicle', correct: true },
                    { text: '🍎 Apel', type: 'fruit', correct: false },
                    { text: '✈️ Pesawat', type: 'vehicle', correct: true },
                    { text: '🐶 Anjing', type: 'animal', correct: false }
                ]
            },
            {
                target: 'benda bulat',
                items: [
                    { text: '⚽ Bola', type: 'round', correct: true },
                    { text: '📚 Buku', type: 'square', correct: false },
                    { text: '🍎 Apel', type: 'round', correct: true },
                    { text: '🏠 Rumah', type: 'square', correct: false }
                ]
            }
        ];

        const sequenceProblems = [
            { question: 'Urutan angka dari kecil ke besar:', optionA: '1234', optionB: '4321', correct: 'A' },
            { question: 'Urutan angka yang benar:', optionA: '4213', optionB: '1234', correct: 'B' },
            { question: 'Urutan dari 1 sampai 4:', optionA: '1324', optionB: '1234', correct: 'B' },
            { question: 'Urutan menurun dari 4 ke 1:', optionA: '4321', optionB: '1234', correct: 'A' },
            { question: 'Urutan naik yang benar:', optionA: '2143', optionB: '1234', correct: 'B' },
            { question: 'Urutan turun dari besar ke kecil:', optionA: '1432', optionB: '4321', correct: 'B' },
            { question: 'Urutan 2-3-4-1 yang benar:', optionA: '2341', optionB: '1234', correct: 'B' },
            { question: 'Urutan mundur dari 4:', optionA: '4321', optionB: '1243', correct: 'A' }
        ];

        function login() {
            const usernameInput = document.getElementById('usernameInput').value.trim();
            
            if (usernameInput === '') {
                alert('Ayo tulis nama kamu dulu! 😊');
                return;
            }
            
            username = usernameInput;
            document.getElementById('displayUsername').textContent = username;
            
            // Hide login screen and show main menu
            document.getElementById('loginScreen').classList.add('hidden');
            document.getElementById('mainMenu').classList.remove('hidden');
            
            // Show control buttons when entering main menu
            document.getElementById('controlButtons').style.display = 'flex';
        }

        function logout() {
            // Reset username and go back to login
            username = '';
            document.getElementById('usernameInput').value = '';
            document.querySelectorAll('.game-card').forEach(card => card.classList.add('hidden'));
            document.getElementById('mainMenu').classList.add('hidden');
            document.getElementById('loginScreen').classList.remove('hidden');
            
            // Hide control buttons when back to login
            document.getElementById('controlButtons').style.display = 'none';
            currentGame = '';
        }

        function startReading() {
            showGame('readingGame');
            currentGame = 'reading';
            loadReading();
        }

        function startMath() {
            showGame('mathGame');
            currentGame = 'math';
            // Set default mode to hard
            setMathMode('hard');
        }

        function startGuessing() {
            showGame('guessGame');
            currentGame = 'guess';
            loadGuess();
        }

        function startSequence() {
            showGame('sequenceGame');
            currentGame = 'sequence';
            loadSequence();
        }

        function showGame(gameId) {
            document.getElementById('mainMenu').classList.add('hidden');
            document.querySelectorAll('.game-card').forEach(card => card.classList.add('hidden'));
            document.getElementById(gameId).classList.remove('hidden');
        }

        function loadReading() {
            const data = readingData[currentReadingIndex];
            document.getElementById('alphabetDisplay').textContent = data.letter;
            document.getElementById('alphabetLowercase').textContent = data.lowercase;
            document.getElementById('syllableDisplay').textContent = data.syllable;
            document.getElementById('readingExample').innerHTML = `Contoh: <strong>${data.example}</strong>`;
        }

        function setMathMode(mode) {
            mathMode = mode;
            
            // Update button styles
            const easyBtn = document.getElementById('easyModeBtn');
            const hardBtn = document.getElementById('hardModeBtn');
            
            if (mode === 'easy') {
                easyBtn.className = 'btn btn-warning me-2';
                hardBtn.className = 'btn btn-outline-danger';
            } else {
                easyBtn.className = 'btn btn-outline-warning me-2';
                hardBtn.className = 'btn btn-danger';
            }
            
            // Reload math problem with new mode
            loadMath();
        }

        function loadMath() {
            const problem = mathProblems[Math.floor(Math.random() * mathProblems.length)];
            
            // Set problem text based on mode
            if (mathMode === 'easy') {
                document.getElementById('mathProblem').textContent = problem.easyProblem;
            } else {
                document.getElementById('mathProblem').textContent = problem.problem;
            }
            
            const visualContainer = document.getElementById('mathVisual');
            visualContainer.innerHTML = '';
            
            // Set visual based on mode
            const visualData = mathMode === 'easy' ? problem.visual : problem.numbers;
            
            visualData.forEach(item => {
                const div = document.createElement('div');
                div.className = 'math-item';
                div.textContent = item;
                visualContainer.appendChild(div);
            });
            
            const equalDiv = document.createElement('div');
            equalDiv.className = 'math-item';
            equalDiv.textContent = '=';
            visualContainer.appendChild(equalDiv);
            
            const input = document.createElement('input');
            input.type = 'number';
            input.className = 'answer-input';
            input.id = 'mathAnswer';
            input.placeholder = '?';
            visualContainer.appendChild(input);
            
            currentMathAnswer = problem.answer;
            document.getElementById('mathResult').classList.add('hidden');
        }

        function loadGuess() {
            const problem = guessProblems[Math.floor(Math.random() * guessProblems.length)];
            document.getElementById('guessTarget').textContent = problem.target;
            currentGuessTarget = problem.target;
            
            const grid = document.getElementById('imageGrid');
            grid.innerHTML = '';
            selectedImages = [];
            
            // Shuffle items
            const shuffled = [...problem.items].sort(() => Math.random() - 0.5);
            
            shuffled.forEach(item => {
                const div = document.createElement('div');
                div.className = 'image-item';
                div.textContent = item.text;
                div.dataset.correct = item.correct;
                div.onclick = () => selectImage(div);
                grid.appendChild(div);
            });
            
            document.getElementById('guessResult').classList.add('hidden');
        }

        function loadSequence() {
            const problem = sequenceProblems[Math.floor(Math.random() * sequenceProblems.length)];
            document.getElementById('sequenceQuestion').textContent = problem.question;
            document.getElementById('optionA').textContent = problem.optionA;
            document.getElementById('optionB').textContent = problem.optionB;
            correctSequence = problem.correct;
            
            // Reset buttons
            document.querySelectorAll('#sequenceGame .btn').forEach(btn => {
                btn.className = 'btn btn-outline-primary btn-lg';
            });
            
            document.getElementById('sequenceResult').classList.add('hidden');
        }

        function selectImage(element) {
            element.classList.toggle('selected');
        }

        function selectSequence(button, option) {
            // Reset all buttons
            document.querySelectorAll('#sequenceGame .btn-outline-primary, #sequenceGame .btn-success, #sequenceGame .btn-danger').forEach(btn => {
                btn.className = 'btn btn-outline-primary btn-lg';
            });
            
            // Highlight selected
            if (option === correctSequence) {
                button.className = 'btn btn-success btn-lg';
                showResult('sequenceResult', true, 'Benar! 🎉');
            } else {
                button.className = 'btn btn-danger btn-lg';
                showResult('sequenceResult', false, 'Coba lagi! 😊');
            }
        }

        function checkMathAnswer() {
            const userAnswer = parseInt(document.getElementById('mathAnswer').value);
            const isCorrect = userAnswer === currentMathAnswer;
            const message = isCorrect ? `Benar! Jawabannya ${currentMathAnswer} 🎉` : `Coba lagi! Jawabannya ${currentMathAnswer} 😊`;
            showResult('mathResult', isCorrect, message);
        }

        function checkGuessAnswer() {
            const selected = document.querySelectorAll('.image-item.selected');
            const correctItems = document.querySelectorAll('.image-item[data-correct="true"]');
            
            let isCorrect = selected.length === correctItems.length;
            if (isCorrect) {
                selected.forEach(item => {
                    if (item.dataset.correct !== 'true') {
                        isCorrect = false;
                    }
                });
            }
            
            const message = isCorrect ? 'Benar! 🎉' : 'Coba lagi! Pilih semua yang benar 😊';
            showResult('guessResult', isCorrect, message);
        }

        function showResult(elementId, isCorrect, message) {
            const element = document.getElementById(elementId);
            element.textContent = message;
            element.className = `result-message ${isCorrect ? 'correct' : 'incorrect'}`;
            element.classList.remove('hidden');
        }

        function randomizeQuestion() {
            switch(currentGame) {
                case 'reading':
                    // Move to next letter in sequence
                    currentReadingIndex = (currentReadingIndex + 1) % readingData.length;
                    loadReading();
                    break;
                case 'math':
                    loadMath();
                    break;
                case 'guess':
                    loadGuess();
                    break;
                case 'sequence':
                    loadSequence();
                    break;
            }
        }

        function goBack() {
            document.querySelectorAll('.game-card').forEach(card => card.classList.add('hidden'));
            document.getElementById('mainMenu').classList.remove('hidden');
            currentGame = '';
        }

        // Initialize app - start with login screen
        document.addEventListener('DOMContentLoaded', function() {
            // Show login screen first and hide control buttons
            document.getElementById('loginScreen').classList.remove('hidden');
            document.getElementById('mainMenu').classList.add('hidden');
            document.getElementById('controlButtons').style.display = 'none';
            
            // Allow Enter key to login
            document.getElementById('usernameInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    login();
                }
            });
            
            // Auto-focus on input when math game loads
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('answer-input')) {
                    e.target.focus();
                }
            });
        });
    </script>
</body>
</html>