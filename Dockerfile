# Utilise l'image officielle PHP avec serveur intégré
FROM php:8.3-cli

# Copie tout le code dans le conteneur
COPY . /app
WORKDIR /app

# Expose le port 10000 (ou celui que tu veux)
EXPOSE 10000

# Commande de démarrage du serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
