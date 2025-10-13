// js/main.js
function openModal() {
    document.getElementById('createOrgModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('createOrgModal').classList.add('hidden');
}

// TTS Function
function callQueue(queueNumber, roomNumber) {
    if ('speechSynthesis' in window) {
        const utterance = new SpeechSynthesisUtterance(`Nomor antrian ${queueNumber}, dipersilahkan ke ruangan ${roomNumber}.`);
        utterance.lang = 'id-ID';
        speechSynthesis.speak(utterance);
    } else {
        alert('Browser tidak mendukung Text-to-Speech.');
    }
}

// Example usage: callQueue('B001', '3');