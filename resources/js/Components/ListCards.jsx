// ListCards.jsx
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Spinner from 'react-bootstrap/Spinner';
import Card_C from './Card_C';

function ListCards() {
    const [userData, setUserData] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const getProducts = async () => {
            try {
                const response = await axios.get('http://localhost/petShop3/public/api/Product_index');
                setUserData(response.data);
            } catch (error) {
                console.error(error);
            } finally {
                setLoading(false);
            }
        };

        getProducts();
    }, []);

    const renderProductRows = () => {
        const productsPerRow = 4;

        return userData.reduce((rows, product, index) => {
            const rowIndex = Math.floor(index / productsPerRow);

            if (!rows[rowIndex]) {
                rows[rowIndex] = [];
            }

            rows[rowIndex].push(
                <div className="col-md-3" key={product.id}>
                    <Card_C product={product} />
                </div>
            );

            return rows;
        }, []).map((row, rowIndex) => (
            <div className="row" key={rowIndex}>
                {row}
            </div>
        ));
    };

    return (
        <>
            {loading ? (
                <Spinner animation="border" role="status">
                    <span className="visually-hidden">Loading...</span>
                </Spinner>
            ) : (
                renderProductRows()
            )}
        </>
    );
}

export default ListCards;
