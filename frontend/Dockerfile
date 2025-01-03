FROM node:18-alpine

WORKDIR /app/frontend

# Копируем файлы в контейнер
COPY . .

# Устанавливаем зависимости
RUN npm install

CMD npm run dev

# Открываем порт 3000
EXPOSE 3000