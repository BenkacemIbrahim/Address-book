document.addEventListener('DOMContentLoaded', function () {
    const addContactBtn = document.getElementById('addContactBtn');
    const contactModal = document.getElementById('contactModal');
    const contactForm = document.getElementById('contactForm');
    const cancelBtn = document.getElementById('cancelBtn');
    const modalTitle = document.getElementById('modalTitle');
    const contactsTable = document.getElementById('contactsTable').getElementsByTagName('tbody')[0];
    const searchInput = document.getElementById('searchInput');

    // Load contacts on page load
    loadContacts();

    // Add contact button click event
    addContactBtn.addEventListener('click', () => {
        modalTitle.textContent = 'Ajouter un Contact';
        contactForm.reset();
        showModal();
    });

    // Cancel button click event
    cancelBtn.addEventListener('click', hideModal);

    // Form submit event
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(contactForm);
        const contactId = document.getElementById('contactId').value;

        if (contactId) {
            // Update existing contact
            formData.append('id', contactId);
            updateContact(formData);
        } else {
            // Add new contact
            addContact(formData);
        }
    });

    // Search input event
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = contactsTable.getElementsByTagName('tr');

        for (let row of rows) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        }
    });

    // Load contacts function
    function loadContacts() {
        fetch('get_contacts.php')
            .then(response => response.json())
            .then(contacts => {
                contactsTable.innerHTML = '';
                contacts.forEach((contact, index) => {
                    const row = contactsTable.insertRow();
                    row.classList.add('animate-fade-in', 'hover:bg-gray-50', 'transition', 'duration-150', 'ease-in-out');
                    row.style.animationDelay = `${index * 50}ms`;
                    row.innerHTML = `
                        <td class="py-4 px-6 border-b">${contact.name}</td>
                        <td class="py-4 px-6 border-b">${contact.phone}</td>
                        <td class="py-4 px-6 border-b">${contact.email}</td>
                        <td class="py-4 px-6 border-b">${contact.address}</td>
                        <td class="py-4 px-6 border-b">
                            <button onclick="editContact(${contact.id})" class="text-primary hover:text-primary-dark mr-2 animate-scale">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteContact(${contact.id})" class="text-accent hover:text-accent-dark animate-scale">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                });
            });
    }

    // Add contact function
    function addContact(formData) {
        fetch('add_contact.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    hideModal();
                    loadContacts();
                    showNotification('Contact ajouté avec succès', 'success');
                } else {
                    showNotification('Erreur lors de l\'ajout du contact', 'error');
                }
            });
    }

    // Update contact function
    function updateContact(formData) {
        fetch('update_contact.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    hideModal();
                    loadContacts();
                    showNotification('Contact mis à jour avec succès', 'success');
                } else {
                    showNotification('Erreur lors de la mise à jour du contact', 'error');
                }
            });
    }

    // Delete contact function
    window.deleteContact = function (id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')) {
            const formData = new FormData();
            formData.append('id', id);

            fetch('delete_contact.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        loadContacts();
                        showNotification('Contact supprimé avec succès', 'success');
                    } else {
                        showNotification('Erreur lors de la suppression du contact', 'error');
                    }
                });
        }
    }

    // Edit contact function
    window.editContact = function (id) {
        const contact = Array.from(contactsTable.rows).find(row => row.cells[4].innerHTML.includes(`editContact(${id})`));
        if (contact) {
            modalTitle.textContent = 'Modifier le Contact';
            document.getElementById('contactId').value = id;
            document.getElementById('name').value = contact.cells[0].textContent;
            document.getElementById('phone').value = contact.cells[1].textContent;
            document.getElementById('email').value = contact.cells[2].textContent;
            document.getElementById('address').value = contact.cells[3].textContent;
            showModal();
        }
    }

    // Show modal function
    function showModal() {
        contactModal.classList.remove('hidden');
        contactModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    // Hide modal function
    function hideModal() {
        contactModal.classList.add('hidden');
        contactModal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Show notification function
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} animate-fade-in`;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
});