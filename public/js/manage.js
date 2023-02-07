let opinions = document.getElementsByClassName("contacts-list__opinion");
contacts - list__opinion;

opinions.forEach((content) => {
    content.textContent = omittedContect(content.textContent);
});

function ommittedContent(stirng) {
    const MAX_LENGTH = 25;

    return string.length > MAX_LENGTH
        ? string.substr(0, MAX_LENGTH) + "..."
        : string;
}
