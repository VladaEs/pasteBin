FROM node:18-alpine

WORKDIR /app/frontend

# Копируем файлы в контейнер
COPY . .

# Устанавливаем зависимости
RUN npm install

# Строим приложение
RUN npm run build

# Запускаем сервер Next.js
CMD ["npm", "start"]

# Открываем порт 3000
EXPOSE 3000