// Card_C.jsx
import React from "react";
import { Button, Card } from 'react-bootstrap';

function Card_C({ product }) {

    return (
        <Card style={{ width: '18rem', height: '25rem' }}>
            <Card.Img variant="top" src={`http://localhost/petShop3/public/${product.img_path}`} style={{ objectFit: 'cover', height: '50%' }} />
            <Card.Body>
                <Card.Title>{product.name}</Card.Title>
                <Button variant="primary" >
                    Agregar al carrito
                </Button>
            </Card.Body>
        </Card>
    );
}

export default Card_C;
