// Załóżmy, że dane klientów będą pobierane z API pod adresem /api/clients

import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';
import axios from 'axios';

// Komponent Listy Klientów
const ClientList = () => {
  const [clients, setClients] = useState([]);

  useEffect(() => {
    axios.get('/api/clients')
      .then((response) => {
        setClients(response.data);
      })
      .catch((error) => {
        console.error('Błąd podczas pobierania danych klientów', error);
      });
  }, []);

  return (
    <div>
      <h1>Lista Klientów</h1>
      <ul>
        {clients.map((client) => (
          <li key={client.id}>
            <Link to={`/client/${client.id}`}>{client.name}</Link>
          </li>
        ))}
      </ul>
    </div>
  );
};

// Komponent Szczegółów Klienta
const ClientDetails = ({ match }) => {
  const clientId = match.params.id;
  const [clientDetails, setClientDetails] = useState(null);

  useEffect(() => {
    axios.get(`/api/clients/${clientId}`)
      .then((response) => {
        setClientDetails(response.data);
      })
      .catch((error) => {
        console.error('Błąd podczas pobierania danych klienta', error);
      });
  }, [clientId]);

  if (!clientDetails) {
    return <div>Ładowanie...</div>;
  }

  return (
    <div>
      <h1>Szczegóły Klienta: {clientDetails.name}</h1>
      <p>Pracownik: {clientDetails.employee}</p>
      <p>Ostatnio kupione rzeczy: {clientDetails.recentPurchases}</p>
      <p>Łącznie wydane pieniądze: {clientDetails.totalSpent}</p>
      <p>Samochód: {clientDetails.car}</p>
    </div>
  );
};

// Główna aplikacja z routingiem
const App = () => {
  return (
    <Router>
      <div>
        <Route exact path="/" component={ClientList} />
        <Route path="/client/:id" component={ClientDetails} />
      </div>
    </Router>
  );
};

export default App;
