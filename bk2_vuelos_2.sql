--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.3
-- Dumped by pg_dump version 9.5.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'WIN1252';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aeropuerto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE aeropuerto (
    idaeropuerto integer NOT NULL,
    nombre character varying(255),
    idpais integer
);


ALTER TABLE aeropuerto OWNER TO postgres;

--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE aeropuerto_idaeropuerto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE aeropuerto_idaeropuerto_seq OWNER TO postgres;

--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE aeropuerto_idaeropuerto_seq OWNED BY aeropuerto.idaeropuerto;


--
-- Name: asiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE asiento (
    idasiento integer NOT NULL,
    letra character varying(1),
    fila integer
);


ALTER TABLE asiento OWNER TO postgres;

--
-- Name: asiento_idasiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE asiento_idasiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE asiento_idasiento_seq OWNER TO postgres;

--
-- Name: asiento_idasiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE asiento_idasiento_seq OWNED BY asiento.idasiento;


--
-- Name: avion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE avion (
    idavion integer NOT NULL,
    marca character varying(150),
    capacidad integer
);


ALTER TABLE avion OWNER TO postgres;

--
-- Name: avion_idavion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE avion_idavion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE avion_idavion_seq OWNER TO postgres;

--
-- Name: avion_idavion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE avion_idavion_seq OWNED BY avion.idavion;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cliente (
    idcliente integer NOT NULL,
    nombres character varying(100),
    apellidos character varying(150),
    direccion character varying(255),
    direccion_facturacion character varying(255),
    modo_pago character varying(25),
    nacimiento date
);


ALTER TABLE cliente OWNER TO postgres;

--
-- Name: cliente_idpasajero_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cliente_idpasajero_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cliente_idpasajero_seq OWNER TO postgres;

--
-- Name: cliente_idpasajero_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cliente_idpasajero_seq OWNED BY cliente.idcliente;


--
-- Name: disponibles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE disponibles (
    iddisponibles integer NOT NULL,
    idorigen integer NOT NULL,
    iddestino integer NOT NULL,
    idtarifa integer NOT NULL,
    fechahora timestamp without time zone,
    idavion integer NOT NULL
);


ALTER TABLE disponibles OWNER TO postgres;

--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disponibles_iddisponibles_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE disponibles_iddisponibles_seq OWNER TO postgres;

--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE disponibles_iddisponibles_seq OWNED BY disponibles.iddisponibles;


--
-- Name: hospedaje; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE hospedaje (
    idhospedaje integer NOT NULL,
    idsuite integer NOT NULL,
    idhotel integer NOT NULL,
    dias integer NOT NULL,
    total double precision,
    idcliente integer NOT NULL
);


ALTER TABLE hospedaje OWNER TO postgres;

--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hospedaje_idhospedaje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE hospedaje_idhospedaje_seq OWNER TO postgres;

--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hospedaje_idhospedaje_seq OWNED BY hospedaje.idhospedaje;


--
-- Name: hotel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE hotel (
    idhotel integer NOT NULL,
    capacidad integer,
    nombre character varying(150),
    direccion character varying(255)
);


ALTER TABLE hotel OWNER TO postgres;

--
-- Name: hotel_idhotel_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hotel_idhotel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE hotel_idhotel_seq OWNER TO postgres;

--
-- Name: hotel_idhotel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hotel_idhotel_seq OWNED BY hotel.idhotel;


--
-- Name: pais; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pais (
    idpais integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE pais OWNER TO postgres;

--
-- Name: pais_idpais_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pais_idpais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pais_idpais_seq OWNER TO postgres;

--
-- Name: pais_idpais_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pais_idpais_seq OWNED BY pais.idpais;


--
-- Name: suite; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE suite (
    idsuite integer NOT NULL,
    clase character varying(100),
    precio double precision,
    numsuite integer
);


ALTER TABLE suite OWNER TO postgres;

--
-- Name: suite_idsuite_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE suite_idsuite_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE suite_idsuite_seq OWNER TO postgres;

--
-- Name: suite_idsuite_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE suite_idsuite_seq OWNED BY suite.idsuite;


--
-- Name: tarifa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tarifa (
    idtarifa integer NOT NULL,
    clase character varying(100),
    precio double precision
);


ALTER TABLE tarifa OWNER TO postgres;

--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tarifa_idtarifa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tarifa_idtarifa_seq OWNER TO postgres;

--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tarifa_idtarifa_seq OWNED BY tarifa.idtarifa;


--
-- Name: vuelo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE vuelo (
    idvuelo integer NOT NULL,
    idasiento integer NOT NULL,
    idcliente integer NOT NULL,
    monto double precision,
    cupon double precision,
    total double precision,
    iddisponibles integer NOT NULL
);


ALTER TABLE vuelo OWNER TO postgres;

--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE vuelo_idvuelo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE vuelo_idvuelo_seq OWNER TO postgres;

--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE vuelo_idvuelo_seq OWNED BY vuelo.idvuelo;


--
-- Name: idaeropuerto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aeropuerto ALTER COLUMN idaeropuerto SET DEFAULT nextval('aeropuerto_idaeropuerto_seq'::regclass);


--
-- Name: idasiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY asiento ALTER COLUMN idasiento SET DEFAULT nextval('asiento_idasiento_seq'::regclass);


--
-- Name: idavion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY avion ALTER COLUMN idavion SET DEFAULT nextval('avion_idavion_seq'::regclass);


--
-- Name: idcliente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente ALTER COLUMN idcliente SET DEFAULT nextval('cliente_idpasajero_seq'::regclass);


--
-- Name: iddisponibles; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles ALTER COLUMN iddisponibles SET DEFAULT nextval('disponibles_iddisponibles_seq'::regclass);


--
-- Name: idhospedaje; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hospedaje ALTER COLUMN idhospedaje SET DEFAULT nextval('hospedaje_idhospedaje_seq'::regclass);


--
-- Name: idhotel; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hotel ALTER COLUMN idhotel SET DEFAULT nextval('hotel_idhotel_seq'::regclass);


--
-- Name: idpais; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pais ALTER COLUMN idpais SET DEFAULT nextval('pais_idpais_seq'::regclass);


--
-- Name: idsuite; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY suite ALTER COLUMN idsuite SET DEFAULT nextval('suite_idsuite_seq'::regclass);


--
-- Name: idtarifa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tarifa ALTER COLUMN idtarifa SET DEFAULT nextval('tarifa_idtarifa_seq'::regclass);


--
-- Name: idvuelo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vuelo ALTER COLUMN idvuelo SET DEFAULT nextval('vuelo_idvuelo_seq'::regclass);


--
-- Data for Name: aeropuerto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aeropuerto (idaeropuerto, nombre, idpais) FROM stdin;
10	Puerto 1	5
15	Puerto 2	4
16	Puerto 3	3
17	Puerto 4	2
20	Puerto 5	6
\.


--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('aeropuerto_idaeropuerto_seq', 20, true);


--
-- Data for Name: asiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY asiento (idasiento, letra, fila) FROM stdin;
1	A	1
2	B	10
3	C	100
4	D	2
5	E	20
\.


--
-- Name: asiento_idasiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('asiento_idasiento_seq', 5, true);


--
-- Data for Name: avion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY avion (idavion, marca, capacidad) FROM stdin;
1	Marca 1	100
2	Marca 2	2000
3	Marca 3	300
4	Marca 4	4000
\.


--
-- Name: avion_idavion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('avion_idavion_seq', 4, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cliente (idcliente, nombres, apellidos, direccion, direccion_facturacion, modo_pago, nacimiento) FROM stdin;
\.


--
-- Name: cliente_idpasajero_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cliente_idpasajero_seq', 1, false);


--
-- Data for Name: disponibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY disponibles (iddisponibles, idorigen, iddestino, idtarifa, fechahora, idavion) FROM stdin;
1	10	15	1	2014-08-12 00:00:00	1
2	10	16	2	2014-08-13 00:00:00	1
3	20	15	3	2014-09-12 00:00:00	1
4	16	17	1	2014-08-12 00:00:00	1
5	17	20	2	2014-09-12 00:00:00	1
6	20	10	3	2014-08-13 00:00:00	1
\.


--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disponibles_iddisponibles_seq', 6, true);


--
-- Data for Name: hospedaje; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hospedaje (idhospedaje, idsuite, idhotel, dias, total, idcliente) FROM stdin;
\.


--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hospedaje_idhospedaje_seq', 1, false);


--
-- Data for Name: hotel; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY hotel (idhotel, capacidad, nombre, direccion) FROM stdin;
1	20000	Hotel 1	Direccion 1
2	40000	Hotel 2	Direccion 2
3	80000	Hotel 3	Direccion 3
4	10000	Hotel 4	Direccion 4
5	50000	Hotel 5	Direccion 5
\.


--
-- Name: hotel_idhotel_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hotel_idhotel_seq', 5, true);


--
-- Data for Name: pais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pais (idpais, nombre) FROM stdin;
2	Brazil
3	Mexico
4	Argentina
5	Canada
6	Chile
\.


--
-- Name: pais_idpais_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pais_idpais_seq', 6, true);


--
-- Data for Name: suite; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY suite (idsuite, clase, precio, numsuite) FROM stdin;
1	Primera Clase	50000	1
2	Segunda Clase	30000	10
3	Tercera Clase	10000	100
\.


--
-- Name: suite_idsuite_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('suite_idsuite_seq', 3, true);


--
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tarifa (idtarifa, clase, precio) FROM stdin;
1	Primera Clase	2000
2	Turista	1500
3	Negocios	1800
\.


--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tarifa_idtarifa_seq', 3, true);


--
-- Data for Name: vuelo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY vuelo (idvuelo, idasiento, idcliente, monto, cupon, total, iddisponibles) FROM stdin;
\.


--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('vuelo_idvuelo_seq', 1, false);


--
-- Name: aeropuertopk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aeropuerto
    ADD CONSTRAINT aeropuertopk PRIMARY KEY (idaeropuerto);


--
-- Name: asientopk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY asiento
    ADD CONSTRAINT asientopk PRIMARY KEY (idasiento);


--
-- Name: avionpk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY avion
    ADD CONSTRAINT avionpk PRIMARY KEY (idavion);


--
-- Name: clientepk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT clientepk PRIMARY KEY (idcliente);


--
-- Name: disponiblespk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblespk PRIMARY KEY (iddisponibles);


--
-- Name: hospedajepk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajepk PRIMARY KEY (idhospedaje, idsuite, idhotel, idcliente);


--
-- Name: hotelpk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hotel
    ADD CONSTRAINT hotelpk PRIMARY KEY (idhotel);


--
-- Name: paispk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pais
    ADD CONSTRAINT paispk PRIMARY KEY (idpais);


--
-- Name: suitepk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY suite
    ADD CONSTRAINT suitepk PRIMARY KEY (idsuite);


--
-- Name: tarifapk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tarifa
    ADD CONSTRAINT tarifapk PRIMARY KEY (idtarifa);


--
-- Name: vuelopk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelopk PRIMARY KEY (idvuelo, idasiento, idcliente, iddisponibles);


--
-- Name: aeropuertofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aeropuerto
    ADD CONSTRAINT aeropuertofk FOREIGN KEY (idpais) REFERENCES pais(idpais);


--
-- Name: disponiblesfk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk FOREIGN KEY (idorigen) REFERENCES aeropuerto(idaeropuerto);


--
-- Name: disponiblesfk2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk2 FOREIGN KEY (iddestino) REFERENCES aeropuerto(idaeropuerto);


--
-- Name: disponiblesfk3; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk3 FOREIGN KEY (idtarifa) REFERENCES tarifa(idtarifa);


--
-- Name: disponiblesfk4; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk4 FOREIGN KEY (idavion) REFERENCES avion(idavion);


--
-- Name: hospedajefk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk FOREIGN KEY (idsuite) REFERENCES suite(idsuite);


--
-- Name: hospedajefk2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk2 FOREIGN KEY (idhotel) REFERENCES hotel(idhotel);


--
-- Name: hospedajefk3; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk3 FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- Name: vuelofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelofk FOREIGN KEY (iddisponibles) REFERENCES disponibles(iddisponibles);


--
-- Name: vuelofk4; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelofk4 FOREIGN KEY (idasiento) REFERENCES asiento(idasiento);


--
-- Name: vuelofk5; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelofk5 FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

