function back() {
    if ('referrer' in document) {
        window.location = document.referrer;
    } else {
        window.history.back();
    }
}